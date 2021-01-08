<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class SlideController extends Controller
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

        $slides = Slide::paginate($perpage);
        $title = 'Slides';

        return view('admin.slides.home',
            [
                'title'     => $title,
                'slides'    => $slides,
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
        $slide = new Slide;
        $slide->link = $request->link ? $request->link : "none";
        $slide->image = $request->image_link ? $request->image_link : "none";
        $slide->creator_id = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $name = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move('images/slides', $name);
            $slide->image = $path;
        }

        $slide->save();
        return redirect()->back()->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        File::delete($slide->image);
        $slide->delete();
        return redirect()->back()->with('success', 'Delete success');
    }
}