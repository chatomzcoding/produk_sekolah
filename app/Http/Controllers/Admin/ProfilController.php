<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'profil';

        $main   = [
            'link' => 'profil'
        ];
        $profil     = Profil::first();
        return view('admin.profil.index', compact('menu','main','profil'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $gambar = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'public/img';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$gambar);
            deletefile($tujuan_upload.'/'.$profil->gambar);
        } else {
            $gambar = $profil->gambar;
        }
        if (isset($request->logo)) {
            $request->validate([
                'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('logo');
            
            $logo = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'public/img';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$logo);
            deletefile($tujuan_upload.'/'.$profil->logo);
        } else {
            $logo = $profil->logo;
        }

        Profil::where('id',$profil->id)->update([
            'nama_sekolah' => $request->nama_sekolah,
            'tentang' => $request->tentang,
            'sejarah' => $request->sejarah,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'gambar' => $gambar,
            'logo' => $logo,
        ]);

        return back()->with('successv2','Profil berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
