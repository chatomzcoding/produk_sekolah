<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lms;
use App\Models\Mapel;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lms    = Lms::all();
        $mapel  = Mapel::all();
        $main   = [
            'link' => 'lms'
        ];
        return view('admin.lms.index', compact('main','lms','mapel'));
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
        Lms::create($request->all());

        return back()->with('ds','LMS');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function show($lms)
    {
        $lms    = Lms::find($lms);
        $materifile = $lms->materi->where('sesi','materi');
        $tugas = $lms->materi->where('sesi','tugas');
        $main   = [
            'link' => 'materi'
        ];
        return view('admin.lms.show', compact('main','lms','materifile','tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function edit(Lms $lms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Lms::where('id',$request->id)->update([
            'mapel_id' => $request->mapel_id,
            'fase' => $request->fase,
        ]);
        return back()->with('du','LMS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lms  $lms
     * @return \Illuminate\Http\Response
     */
    public function destroy($lms)
    {
        Lms::find($lms)->delete();
        
        return back()->with('dd','LMS');
    }
}
