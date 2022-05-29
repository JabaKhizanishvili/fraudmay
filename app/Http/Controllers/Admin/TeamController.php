<?php
/**
 *  app/Http/Controllers/Admin/TeamController.php
 *
 * Date-Time: 30.07.21
 * Time: 10:37
 * @author suspended values
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use App\Repositories\TeamRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use ReflectionException;

class TeamController extends Controller
{
    /**
     * @var TeamRepositoryInterface
     */
    private $teamRepository;


    /**
     * @param TeamRepositoryInterface $teamRepository
     */
    public function __construct(TeamRepositoryInterface  $teamRepository)
    {
        $this->teamRepository = $teamRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(TeamRequest $request)
    {

        return view('admin.pages.team.index', [
            'teams' => $this->teamRepository->getData($request, ['translations'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $team = $this->teamRepository->model;

        $url = locale_route('team.store', [], false);
        $method = 'POST';

        return view('admin.pages.team.form', [
            'team' => $team,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function store(TeamRequest $request)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $saveData['status'] = isset($saveData['status']) && (bool)$saveData['status'];

        $team = $this->teamRepository->create($saveData);

        // Save Files
        if ($request->hasFile('images')) {
            $team = $this->teamRepository->saveFiles($team->id, $request);
        }

        return redirect(locale_route('team.show', $team->id))->with('success', __('admin.create_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param Team $team
     *
     * @return Application|Factory|View
     */
    public function show(string $locale, Team $team)
    {
        return view('admin.pages.team.show', [
            'team' => $team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param Team $team
     * @return Application|Factory|View
     */
    public function edit(string $locale, Team $team)
    {
        $url = locale_route('team.update', $team->id, false);
        $method = 'PUT';

        return view('admin.pages.team.form', [
            'team' => $team,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamRequest $request
     * @param string $locale
     * @param Team $team
     * @return Application|RedirectResponse|Redirector
     * @throws ReflectionException
     */
    public function update(TeamRequest $request, string $locale, Team $team)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $saveData['status'] = isset($saveData['status']) && (bool)$saveData['status'];

        $this->teamRepository->update($team->id, $saveData);


        $this->teamRepository->saveFiles($team->id, $request);


        return redirect(locale_route('team.show', $team->id))->with('success', __('admin.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param Team $team
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(string $locale, Team $team)
    {
        if (!$this->teamRepository->delete($team->id)) {
            return redirect(locale_route('team.show', $team->id))->with('danger', __('admin.not_delete_message'));
        }
        return redirect(locale_route('team.index'))->with('success', __('admin.delete_message'));
    }
}
