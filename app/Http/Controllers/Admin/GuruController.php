<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'guru';
        $guru   = Guru::all();
        $main   = [
            'link' => 'guru'
        ];
        return view('admin.guru.index', compact('menu','main','guru'));
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
        if (isset($request->poto)) {
            $request->validate([
                'poto' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('poto');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/img/guru';
            $file->move($tujuan_upload,$nama_file);
        } else {
            $nama_file = NULL;
        }
        Guru::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'gelar' => $request->gelar,
            'alamat' => $request->alamat,
            'poto' => $nama_file,
        ]);

        return back()->with('ds','Guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $guru = Guru::find($request->id);
        if (isset($request->poto)) {
            $request->validate([
                'poto' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('poto');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/img/guru';
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$guru->poto);
        } else {
            $nama_file = $guru->poto;
        }
        Guru::where('id',$request->id)->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'gelar' => $request->gelar,
            'alamat' => $request->alamat,
            'poto' => $nama_file,
        ]);

        return back()->with('du','Guru');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $tujuan_upload = 'public/img/guru';
        deletefile($tujuan_upload.'/'.$guru->poto);
        $guru->delete();
        return back()->with('dd','Guru');
    }
}
