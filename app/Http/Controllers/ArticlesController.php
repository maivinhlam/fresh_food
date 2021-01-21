<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Articles::Find($id);
        return response()->json([$articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::Find($id);
        $product = Product::Find($articles->product_id);
        $content = $articles->content;
        $title = $product->name;

        return view('admin.articles.edit',
        [
            'title'     => $title,
            'id'        => $id,
            'content'   => $content,
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        $id = $request->id;
        $content = str_replace("&nbsp;", " ", $request->content);
        $articles = Articles::Find($id);
        $product = Product::Find($articles->product_id);
        $articles->content = $content;
        $articles->save();
        return response()->json(['success'=>"Update articles of $product->name success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }
}