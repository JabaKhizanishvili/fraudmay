<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index($locale, Request $request)
    {
//        $page = Page::where('key', 'home')->firstOrFail();
//        $sliders = Slider::query()->where("status", 1)->with(['file', 'translations']);
//        $allert = $request->session()->get('success', null);


        return Inertia::render('Home/Home', );

    }

    public function gallery()
    {
        return Inertia::render('Gallery/Gallery');
    }

    public function doctors()
    {
        return Inertia::render('OurDoctors/OurDoctors');
    }

    public function choosefloor()
    {
        return Inertia::render('ChooseFloor/ChooseFloor');
    }


}
