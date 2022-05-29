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
use App\Http\Requests\Admin\ModeratorRequest;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Blog;
use App\Models\Project;
use App\Models\User;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ModeratorRepositoryInterface;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use ReflectionException;

class ModeratorController extends Controller
{
    /**
     * @var ModeratorRepositoryInterface
     */
    private $userRepository;


    /**
     * @param ModeratorRepositoryInterface $userRepository
     */
    public function __construct(ModeratorRepositoryInterface $userRepository)
    {
        $this->middleware('isAdmin');
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(ModeratorRequest $request)
    {
        $request = $request->merge([
            'moderator' => 1,
            'admin' => 0
        ]);

        return view('admin.pages.moderator.index', [
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

        $url = locale_route('moderator.store', [], false);
        $method = 'POST';

        return view('admin.pages.moderator.form', [
            'user' => $user,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ModeratorRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function store(ModeratorRequest $request)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $user = $this->userRepository->create($saveData);

        // Save Files
        if ($request->hasFile('images')) {
            $user = $this->userRepository->saveFiles($user->id, $request);
        }

        return redirect(locale_route('moderator.show', $user->id))->with('success', __('admin.create_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param User $moderator
     *
     * @return Application|Factory|View
     */
    public function show(string $locale, User $moderator)
    {
        return view('admin.pages.moderator.show', [
            'user' => $moderator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param User $moderator
     * @return Application|Factory|View
     */
    public function edit(string $locale, User $moderator)
    {
        $url = locale_route('moderator.update', $moderator->id, false);
        $method = 'PUT';

        return view('admin.pages.moderator.form', [
            'user' => $moderator,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModeratorRequest $request
     * @param string $locale
     * @param User $moderator
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function update(ModeratorRequest $request, string $locale, User $moderator)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $saveData['verified'] = isset($saveData['verified']) && (bool)$saveData['verified'];

        $this->userRepository->update($moderator->id, $saveData);


        $this->userRepository->saveFiles($moderator->id, $request);


        return redirect(locale_route('moderator.show', $moderator->id))->with('success', __('admin.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param User $moderator
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(string $locale, User $moderator)
    {
        if (!$this->userRepository->delete($moderator->id)) {
            return redirect(locale_route('moderator.show', $moderator->id))->with('danger', __('admin.not_delete_message'));
        }
        return redirect(locale_route('moderator.index'))->with('success', __('admin.delete_message'));
    }
}
