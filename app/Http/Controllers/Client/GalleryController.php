<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Page;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {


        $galleries = Gallery::query()->where("status", 1)->with(['file'])->paginate(10);
        $page = Page::where('key', 'gallery')->firstOrFail();


        return Inertia::render('Gallery/Gallery', ["galleries" => $galleries, "page" =>$page,
            "seo" => [
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


}
