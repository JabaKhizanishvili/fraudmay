<?php

/**
 *  app/Http/Controllers/Admin/ProjectController.php
 *
 * Date-Time: 30.07.21
 * Time: 10:37
 * @author suspended values
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Blog;
use App\Models\Project;
use App\Models\User;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use ReflectionException;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;


    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(BlogRequest $request)
    {
        $request = $request->merge([
            'moderator' => 0,
            'admin' => 0
        ]);

        return view('admin.pages.user.index', [
            'users' => $this->userRepository->getData($request, [])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = $this->userRepository->model;

        $url = locale_route('user.store', [], false);
        $method = 'POST';

        return view('admin.pages.user.form', [
            'user' => $user,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function store(UserRequest $request)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $saveData['verified'] = isset($saveData['verified']) && (bool)$saveData['verified'];
        $user = $this->userRepository->create($saveData);

        // Save Files
        if ($request->hasFile('images')) {
            $user = $this->userRepository->saveFiles($user->id, $request);
        }

        return redirect(locale_route('user.show', $user->id))->with('success', __('admin.create_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param Blog $project
     *
     * @return Application|Factory|View
     */
    public function show(string $locale, User $user)
    {
        return view('admin.pages.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param Blog $project
     * @return Application|Factory|View
     */
    public function edit(string $locale, User $user)
    {
        $url = locale_route('user.update', $user->id, false);
        $method = 'PUT';

        return view('admin.pages.user.form', [
            'user' => $user,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogRequest $request
     * @param string $locale
     * @param Blog $project
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function update(UserRequest $request, string $locale, User $user)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $saveData['verified'] = isset($saveData['verified']) && (bool)$saveData['verified'];

        $this->userRepository->update($user->id, $saveData);


        $this->userRepository->saveFiles($user->id, $request);


        return redirect(locale_route('user.show', $user->id))->with('success', __('admin.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(string $locale, User $user)
    {
        if (!$this->userRepository->delete($user->id)) {
            return redirect(locale_route('user.show', $user->id))->with('danger', __('admin.not_delete_message'));
        }
        return redirect(locale_route('user.index'))->with('success', __('admin.delete_message'));
    }

    public function changePassword()
    {
        $user = User::where(['id' => auth()->user()->id])->first();
        return view('admin.pages.user.change-password', [
            'user' => $user
        ]);
    }


    public function storePassword(ChangePasswordRequest $request)
    {
        $password = Hash::make($request['password']);
        $user = User::where(['id' => auth()->user()->id])->update([
            'password' => $password
        ]);

        if ($user) {
            return redirect(locale_route('change-password'))->with('success', __('password_success_change'));
        }
        return redirect(locale_route('change-password'))->with('fail', __('password_fail_change'));;
    }
}
