<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Certificate;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CertificateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CertificateController extends Controller
{

    /**
     * @var \App\Repositories\CertificateRepositoryInterface
     */
    private $certificateRepository;

    /**
     * @param \App\Repositories\CertificateRepositoryInterface $certificateRepository
     */
    public function __construct(CertificateRepositoryInterface $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.certificate.index', [
            'certificates' => $this->certificateRepository->getData($request, ['translations'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $certificate = $this->certificateRepository->model;

        $url = locale_route('certificate.store', [], false);
        $method = 'POST';

        return view('admin.pages.certificate.form', [
            'certificate' => $certificate,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $saveData = Arr::except($request->except(['_token','images']), []);
        $certificate = $this->certificateRepository->create($saveData);

        // Save Files
        if ($request->hasFile('images')) {
            $certificate = $this->certificateRepository->saveFiles($certificate->id, $request);
        }

        return redirect(locale_route('certificate.show', $certificate->id))->with('success', __('admin.create_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $locale, Certificate $certificate)
    {
        return view('admin.pages.certificate.show', [
            'certificate' => $certificate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $locale, Certificate $certificate)
    {
        $url = locale_route('certificate.update', $certificate->id, false);
        $method = 'PUT';

        return view('admin.pages.certificate.form', [
            'certificate' => $certificate,
            'url' => $url,
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\CategoryRequest $request
     * @param string $locale
     * @param \App\Models\Category $certificate
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, string $locale, Certificate $certificate)
    {
        $saveData = Arr::except($request->except(['_token','_method', "images", "old_images"]), []);

        $this->certificateRepository->update($certificate->id, $saveData);

        $this->certificateRepository->saveFiles($certificate->id, $request);

        return redirect(locale_route('certificate.show', $certificate->id))->with('success', __('admin.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(string $locale, Certificate $certificate)
    {
        if (!$this->certificateRepository->delete($certificate->id)) {
            return redirect(locale_route('category.show', $certificate->id))->with('danger', __('admin.not_delete_message'));
        }
        return redirect(locale_route('certificate.index'))->with('success', __('admin.delete_message'));
    }
}
