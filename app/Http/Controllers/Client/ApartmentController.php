<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Floor;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with(['translations'])->get();
        $page = Page::where('key', 'choose_apartment')->firstOrFail();

        return Inertia::render('ChooseFloor/ChooseFloor', ["apartments" => $apartments, "page" => $page, "seo" => [
            "title"=>$page->meta_title,
            "description"=>$page->meta_description,
            "keywords"=>$page->meta_keyword,
            "og_title"=>$page->meta_og_title,
            "og_description"=>$page->meta_og_description,
//            "image" => "imgg",
//            "locale" => App::getLocale()
        ]])->withViewData([
            'meta_title' => $page->meta_title,
            'meta_description' => $page->meta_description,
            'meta_keyword' => $page->meta_keyword,
            "image" => $page->file,
            'og_title' => $page->meta_og_title,
            'og_description' => $page->meta_og_description
        ]);
    }

    public function showFloor($locale, $slug)
    {
        $page = Page::where('key', 'choose_apartment')->firstOrFail();
//        $apartments = Floor::whereHas('apartment', function (Builder $query) use ($slug) {
//            $query->where('title', $slug);
//        })->with(["apartment"])->get();
        $apartments = Apartment::where("title", $slug)->with([
            'floors' => function ($query) {
                $query->with('translations');
            }
        ])->firstOrFail();

        return Inertia::render('FloorPlan/' . $slug, ["page" => $page, "apartments" => $apartments, "seo" => [
            "title"=>$page->meta_title,
            "description"=>$page->meta_description,
            "keywords"=>$page->meta_keyword,
            "og_title"=>$page->meta_og_title,
            "og_description"=>$page->meta_og_description,
//            "image" => "imgg",
//            "locale" => App::getLocale()
        ]])->withViewData([
            'meta_title' => $page->meta_title,
            'meta_description' => $page->meta_description,
            'meta_keyword' => $page->meta_keyword,
            "image" => $page->file,
            'og_title' => $page->meta_og_title,
            'og_description' => $page->meta_og_description
        ]);
    }

    public function show($locale, $slug)
    {
        $apartment = Floor::with(['translations', 'files', 'pdf'])->where("slug", $slug)->firstOrFail();

//        dd(count($apartment->files)>0 ? $apartment->files[0]: null);
        $page = Page::where('key', 'choose_apartment')->firstOrFail();
        return Inertia::render('Apartment/Apartment', ["apartment" => $apartment, "page" => $page, "seo" => [
            "title"=>$apartment->meta_title??$page->meta_title,
            "description"=>$apartment->meta_description??$page->meta_description,
            "keywords"=>$apartment->meta_keyword??$page->meta_keyword,
            "og_title"=>$page->meta_og_title,
            "og_description"=>$page->meta_og_description,
//            "image" => "imgg",
//            "locale" => App::getLocale()
        ]])->withViewData([
            'meta_title' => $apartment->meta_title??$page->meta_title,
            'meta_description' => $apartment->meta_description??$page->meta_description,
            'meta_keyword' => $apartment->meta_keyword??$page->meta_keyword,
            "image" => count($apartment->files)>0 ? $apartment->files[0]: null,
            'og_title' => $page->meta_og_title,
            'og_description' => $page->meta_og_description
        ]);
    }
}
