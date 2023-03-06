<?php

namespace App\Http\Controllers\User;

use App\Models\Annoucement;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;

use App\Http\Controllers\Controller;

class AnnoucementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Announcements";
        $Annoucements = Annoucement::where('id','=',auth()->user()->id)->get();

        return view('user.annoucements.index', compact('Annoucements', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Announcements create";

        return view('user.annoucements.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreannoucementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnoucementRequest $request)
    {
        Annoucement::create([

            'title' => $request->input('annoucement_name'),
            'description' => $request->input('annoucement_description'),
        ]);

        return redirect()->route('annoucements.index')->with('success', 'Annoucement has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Annoucement $annoucement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Annoucement = Annoucement::findOrfail($id);
        $title = "Announcements edit";
        return view('user.annoucements.edit', compact('Annoucement', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnoucementRequest  $request
     * @param  \App\Models\Annoucement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnoucementRequest $request, Annoucement $annoucement)
    {

        $annoucement->update([
            'title' => $request->input('annoucement_name'),
            'description' => $request->input('annoucement_description'),
        ]);

        return redirect()->route('annoucements.index')->with('success', 'Annoucement has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annoucement = Annoucement::findOrFail($id);

        $annoucement->delete();
        return redirect()->route('annoucements.index')->with('success', 'Annoucement has been deleted');
    }
}
