<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.faqs');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Faqs';
        return view('admin.faq.index', ['faqs' => Faq::paginate(10), 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Faqs Create';
        return view('admin.faq.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'Faq has beed created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $title = 'Faqs Edit';
        return view('admin.faq.edit', compact('faq', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'Faq has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'Faq has been deleted');
    }
}
