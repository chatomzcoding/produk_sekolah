<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas =  Fasilitas::all();

        return view('admin.fasilitas.index', compact('fasilitas'));
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
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img/fasilitas';
        $file->move($tujuan_upload,$nama_file);

        Fasilitas::create([
            'nama' => $request->nama,
            'alias' => $request->alias,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);

        return back()->with('ds','Fasilitas');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $fasilitas = Fasilitas::find($request->id);
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/img/fasilitas';
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$fasilitas->gambar);
        } else {
            $nama_file = $fasilitas->gambar;
        }
        

        Fasilitas::where('id',$request->id)->update([
            'nama' => $request->nama,
            'alias' => $request->alias,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);
        return back()->with('du','Fasilitas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($fasilitas)
    {
        $fasilitas = Fasilitas::find($fasilitas);
        deletefile('public/img/fasilitas/'.$fasilitas->gambar);
        $fasilitas->delete();
        return back()->with('dd','Fasilitas');
    }
}
