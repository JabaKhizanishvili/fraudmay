<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\Repositories\PageRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;

class PageController extends Controller
{

    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;


    /**
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(
        PageRepositoryInterface $pageRepository
    )
    {
        $this->pageRepository = $pageRepository;
    }


    /**
     * @param PageRequest $request
     * @return Application|Factory|View
     */
    public function index(PageRequest $request)
    {
        return view('admin.pages.page.index', [
            'pages' => $this->pageRepository->getData($request, ['translations'])
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param Page $page
     * @return Application|Factory|View
     */
    public function show(string $locale, Page $page)
    {
        return view('admin.pages.page.show', [
            'page' => $page,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(string $locale, Page $page)
    {
        $url = locale_route('page.update', $page->id, false);
        $method = 'PUT';

        return view('admin.pages.page.form', [
            'page' => $page,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param string $locale
     * @param Page $page
     * @return Application|RedirectResponse|Redirector
     */
    public function update(PageRequest $request, string $locale, Page $page)
    {
        $saveData = Arr::except($request->except('_token'), []);
        $this->pageRepository->update($page->id, $saveData);

        $this->pageRepository->saveFiles($page->id, $request);


        return redirect(locale_route('page.show', $page->id))->with('success', __('admin.update_successfully'));
    }

}
