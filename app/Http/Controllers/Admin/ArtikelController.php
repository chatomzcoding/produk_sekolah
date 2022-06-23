<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'artikel';
        $main   = [
            'link' => 'artikel'
        ];
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('menu','main','artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create');
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
        
        // isi dengan judul folder tempat kemana file diupload
        $tujuan_upload = 'public/img/artikel';
        $file->move($tujuan_upload,$nama_file);

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'view' => 0,
            'gambar' => $nama_file,
        ]);

        return redirect('artikel')->with('ds','Artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan judul folder tempat kemana file diupload
            $tujuan_upload = 'public/img/artikel';
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$artikel->gambar);
        } else {
            $nama_file = $artikel->gambar;
        }
        

        Artikel::where('id',$artikel->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $nama_file,
        ]);
        return redirect('artikel')->with('du','Artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        // $artikel = Artikel::find($artikel);
        deletefile('public/img/artikel/'.$artikel->gambar);
        $artikel->delete();
        return back()->with('dd','Artikel');
    }
}
