<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class ProductController extends Controller
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
        $producrtypes = ProductType::all();
        $brands = Brand::all();
        $products = Product::paginate($perpage);
        $title = 'Admin | Products';
        return view('admin.product.home',
                [
                    'products'      => $products,
                    'title'         => $title,
                    'producrtypes'  => $producrtypes,
                    'brands'        => $brands
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
        $product = new Product;
        $product->type_id = $request->type;
        $product->brand_id = $request->brand;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sell_percen = $request->sell_percen;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->image_path = $request->image_path;
        $product->view_count = 0;
        $product->creator_id = Auth::user()->id;
        $product->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->type_id = $request->type;
        $product->brand_id = $request->brand;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sell_percen = $request->sell_percen;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->image_path = $request->image_path;

        $status = $product->save();
        return redirect()->back()->with('success', 'Update success');
        // return Redirect::back()->withErrors(['msg', 'The Message']);
        // @if($errors->any())
        // <h4>{{$errors->first()}}</h4>
        // @endif
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}