<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infowebsite;
use Illuminate\Http\Request;

class InfowebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info   = Infowebsite::first();

        return view('chatomz.admin.infowebsite.index', compact('info'));
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
     * @param  \App\Models\Infowebsite  $infowebsite
     * @return \Illuminate\Http\Response
     */
    public function show(Infowebsite $infowebsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infowebsite  $infowebsite
     * @return \Illuminate\Http\Response
     */
    public function edit(Infowebsite $infowebsite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infowebsite  $infowebsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infowebsite $infowebsite)
    {
        $infowebsite    = Infowebsite::find($request->id);
        if (isset($request->logo_brand)) {
            $request->validate([
                'logo_brand' => 'required|file|image|mimes:jpeg,png,jpg|max:1000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('logo_brand');
            
            $logo_brand = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'img/admin/info';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$logo_brand);
            deletefile($tujuan_upload.'/'.$infowebsite->logo_brand);
        } else {
            $logo_brand  = $infowebsite->logo_brand;
        }

        if (isset($request->bg_produk)) {
            $request->validate([
                'bg_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:1000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('bg_produk');
            
            $bg_produk = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'img/admin/info';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$bg_produk);
            deletefile($tujuan_upload.'/'.$infowebsite->bg_produk);
        } else {
            $bg_produk  = $infowebsite->bg_produk;
        }
        
        Infowebsite::where('id',$infowebsite->id)->update([
            'email'  => $request->email,
            'telp'  => $request->telp,
            'alamat'  => $request->alamat,
            'teks_atas'  => $request->teks_atas,
            'maps'  => $request->maps,
            'tentang'  => $request->tentang,
            'link_fb'  => $request->link_fb,
            'link_tw'  => $request->link_tw,
            'link_ig'  => $request->link_ig,
            'link_yt'  => $request->link_yt,
            'link_in'  => $request->link_in,
            'link_pi'  => $request->link_pi,
            'logo_brand' => $logo_brand,
            'bg_produk' => $bg_produk,
        ]);
        return redirect()->back()->with('du','Info Website');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infowebsite  $infowebsite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infowebsite $infowebsite)
    {
        //
    }
}
