<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.testimonials');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Testimonials";
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index',compact('testimonials','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Textimonials create";
        return view('admin.testimonials.create',compact('title'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        if ($file = $request->file('testimonial_img')) {
            $image = date('YmdHis').".". $file->extension();
            $file->move(public_path('img/testimonials/'),$image);
        }else{
            $image = "";
        }

        Testimonial::create([
            'name'=>$request->input('testimonial_name'),
            'comment'=>$request->input('testimonial_comment'),
            'job'=>$request->input('testimonial_job'),
            'rating'=>$request->input('testimonial_rating'),
            'image'=>$image,
        ]);

        return redirect()->route('testimonials.index')->with('success','Testimonial has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Testimonials Edit";
        $test = Testimonial::findOrfail($id);
        return view ('admin.testimonials.edit',compact('test','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {

        $image = $testimonial->image;

        if($request->hasFile('testimonial_img')){
            $file = $request->file('testimonial_img');
            $image = date('YmdHis').".". $file->extension();
            $file->move(public_path('img/testimonials/'),$image);
        }
       

        $testimonial->update([
            'name'=>$request->input('testimonial_name'),
            'comment'=>$request->input('testimonial_comment'),
            'job'=>$request->input('testimonial_job'),
            'rating'=>$request->input('testimonial_rating'),
            'image'=>$image,
        ]);

        return redirect()->route('testimonials.index')->with('success','Testimonial has been Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success','testimonial has been deleted');
    }
}
