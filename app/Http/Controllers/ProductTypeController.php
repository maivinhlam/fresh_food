<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
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

        $productTypes = ProductType::paginate($perpage);
        $title = 'Product Types';

        return view('admin.product_types.home',
            [
                'title'         => $title,
                'productTypes'  => $productTypes,
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
        $product_type = new ProductType;
        $product_type->name = $request->name;
        $product_type->description = $request->description;
        $product_type->image_path = $request->image_path;
        $product_type->product_count = 0;
        $product_type->creator_id = Auth::user()->id;
        $product_type->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $productType->name = $request->name;
        $productType->description = $request->description;
        $productType->image_path = $request->image_path;
        $productType->creator_id = Auth::user()->id;
        $productType->save();

        return redirect()->back()->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return back();
    }
}
