<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagline;
use Illuminate\Http\Request;

class TaglineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagline = Tagline::all();

        return view('admin.tagline.index', compact('tagline'));
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
        $request->validate([
            'icon' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('icon');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama_tagline folder tempat kemana file diupload
        $tujuan_upload = 'public/img/tagline';
        $file->move($tujuan_upload,$nama_file);

        Tagline::create([
            'nama_tagline' => $request->nama_tagline,
            'keterangan' => $request->keterangan,
            'icon' => $nama_file,
        ]);

        return back()->with('ds','Tagline');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tagline  $tagline
     * @return \Illuminate\Http\Response
     */
    public function show(Tagline $tagline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagline  $tagline
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagline $tagline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagline  $tagline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tagline = Tagline::find($request->id);
        if (isset($request->icon)) {
            $request->validate([
                'icon' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('icon');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama_tagline folder tempat kemana file diupload
            $tujuan_upload = 'public/img/tagline';
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$tagline->icon);
        } else {
            $nama_file = $tagline->icon;
        }
        

        Tagline::where('id',$request->id)->update([
            'nama_tagline' => $request->nama_tagline,
            'keterangan' => $request->keterangan,
            'icon' => $nama_file,
        ]);
        return back()->with('du','Tagline');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagline  $tagline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagline $tagline)
    {
        deletefile('public/img/tagline/'.$tagline->icon);
        $tagline->delete();
        return back()->with('dd','Tagline');
    }
}
