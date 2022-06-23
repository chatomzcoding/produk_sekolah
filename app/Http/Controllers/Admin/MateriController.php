<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        switch ($request->sesi) {
            case 'materi':
                $request->validate([
                    'file' => 'required|mimes:pdf|max:10000',
                ]);
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('file');
                
                $namafile = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'public/lms/file';
                // isi dengan nama folder tempat kemana file diupload
                $file->move($tujuan_upload,$namafile);
                Materi::create([
                    'lms_id' => $request->lms_id,
                    'sesi' => $request->sesi,
                    'nama' => $request->nama,
                    'file' => $namafile,
                ]);

                return back()->with('ds','Materi');
                break;
            
            default:
                # code...
                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        switch ($request->sesi) {
            case 'materi':
                $materi     = Materi::find($request->id);
                if (isset($request->file)) {
                    $request->validate([
                        'file' => 'required|mimes:pdf|max:10000',
                    ]);
                    // menyimpan data file yang diupload ke variabel $file
                    $file = $request->file('file');
                    
                    $namafile = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'public/lms/file';
                    // isi dengan nama folder tempat kemana file diupload
                    $file->move($tujuan_upload,$namafile);
                    deletefile($tujuan_upload.'/'.$materi->file);
                } else {
                    $namafile = $materi->file;
                }
                
                Materi::where('id',$request->id)->update([
                    'nama' => $request->nama,
                    'file' => $namafile,
                ]);

                return back()->with('du','Materi');
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $tujuan_upload = 'public/lms/file';
        deletefile($tujuan_upload.'/'.$materi->file);
        $materi->delete();
        return back()->with('dd','Materi');
    }
}
