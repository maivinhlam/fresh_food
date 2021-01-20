<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
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
        if($request->perPage)
        {
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
        return view('front_end.home',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about(Request $request, $name, $id)
    {

        $product   = Product::Find($id);

        $title = $product->name . " | Fresh Food";
        return view('front_end.product.detail-product',
            [
                'product'               => $product,
                'title'                 => $title,
            ]
        );
    }

}
