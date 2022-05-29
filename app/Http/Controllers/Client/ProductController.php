<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param string $locale
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(string $locale, Request $request)
    {
        $productPage = Page::where('key', 'product')->firstOrFail();
        $categories = Category::whereHas('product', function (Builder $query) {
            $query->where('status', true);
        })->where('status', true)->get();

        $products = Product::query()->with(['file', 'translations']);

        $products = $products->where('status', true);

        if ($request->has('category')) {
            $products = $products->where('category_id',$request['category']);
        }

        return view('client.pages.product.index', [
            'productPage' => $productPage,
            'categories' => $categories,
            'products' => $products->get()
        ]);
    }


    /**
     * @param string $locale
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $locale, string $slug)
    {

        $product = Product::where(['status' => true, 'slug' => $slug])->whereHas('category', function (Builder $query) {
            $query->where('status', 1);
        })->firstOrFail();

        return view('client.pages.product.show', [
            'product' => $product
        ]);
    }

}
