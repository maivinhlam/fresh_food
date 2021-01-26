<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = 20;
        if ($request->perPage) {
            $perpage = $request->perPage;
        }

        $slides     = Slide::all();
        $products   = Product::paginate(15);

        $new_products  =  DB::table('products')
            ->orderBy('created_at', 'asc')
            ->limit(15)
            ->get();

        $hot_view_products  = DB::table('products')
            ->orderBy('view_count', 'desc')
            ->limit(15)
            ->get();

        $hot_buy_products   = DB::table('products')
            ->orderBy('view_count', 'desc')
            ->limit(15)
            ->get();
        $suggestion_products    = Product::paginate(5);
        $news = Product::paginate(5);
        $title = 'Fresh Food';

        return view(
            'front_end.home',
            [
                'products'              => $products,
                'title'                 => $title,
                'slides'                => $slides,
                'hot_view_products'     => $hot_view_products,
                'new_products'          => $new_products,
                'hot_buy_products'      => $hot_buy_products,
                'suggestion_products'   => $suggestion_products,
                'news'                  => $news
            ]
        );
    }

    public function detail_product(Request $request, $name, $id)
    {
        $product   = Product::Find($id);
        $articles = $product->articles;
        $content = $articles->content;
        $product->increment('view_count');
        $title = $product->name . " | Fresh Food";
        return view(
            'front_end.product.detail-product',
            [
                'product'   => $product,
                'title'     => $title,
                'articles'  => $content,
            ]
        );
    }

    public function new_product(Request $request)
    {
        $perpage = 20;
        if ($request->perPage) {
            $perpage = $request->perPage;
        }

        $slides     = Slide::all();
        $products   = Product::paginate(15);

        $new_products  =  DB::table('products')
            ->orderBy('created_at', 'asc')
            ->limit(15)
            ->get();

        $title = 'Fresh Food';

        return view(
            'front_end.product.new',
            [
                'title'                 => $title,
                'new_products'          => $new_products,
            ]
        );
    }

    public function category_product(Request $request)
    {
    }

    public function product_most_buyed(Request $request)
    {
    }

    public function product_most_viewed(Request $request)
    {
    }

    public function category_news(Request $request)
    {
    }

    public function detail_news(Request $request)
    {
    }

    public function cart(Request $request)
    {
        return view('front_end.cart.index');
    }
}
