<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Controllers\Controller;
use App\Models\Package;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.packages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Investment Plan";
        $packages = Package::latest()->get();
        return view('admin.packages.index',compact('packages','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Packages Create";
        return view('admin.packages.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/packages/'), $image);
        }else{
            $image = 'no-image.jpg';
        }

        Package::create([
            'title' => $request->input('title'),
            // 'end_date' => $request->input('end_date'),
            'price' => $request->input('price'),
            'status' => 1,
            // 'status' => $request->input('status') ? 1 : 0,
            // 'video' => $request->input('video'),
            'image' => $image,
            'description' => $request->input('description'),
            // 'external_link' => $request->input('external_link'),
        ]);

        return redirect()->route('packages.index')->with('success', 'Plan has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Package";
        $package = package::findOrFail($id);
        return view('admin.packages.show',compact('package','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Package Edit";
        $package = Package::findOrFail($id);
        return view('admin.packages.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, $id)
    {
        $package = Package::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = date('YmdHis') . "." . $file->extension();
            $file->move(public_path('img/packages/'), $image);
        }else{
            $image =  $package->image;
        }

        $package->update([
            'title' => $request->input('title'),
            // 'end_date' => $request->input('end_date'),
            'price' => $request->input('price'),
            // 'status' => $request->input('status') ? 1 : 0,
            // 'video' => $request->input('video'),
            'image' => $image,
            'description' => $request->input('description'),
            // 'external_link' => $request->input('external_link'),
        ]);

        return redirect()->route('packages.index')->with('success', 'Plan has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Plan has been Deleted');
    }
}
