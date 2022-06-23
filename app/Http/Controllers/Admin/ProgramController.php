<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'program';
        $main   = [
            'link' => 'program'
        ];

        $program    = Program::all();

        return view('admin.program.index', compact('menu','main','program'));
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
        $tujuan_upload = 'public/img/program';
        $file->move($tujuan_upload,$nama_file);

        Program::create([
            'nama' => $request->nama,
            'alias' => $request->alias,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);
        return back()->with('du','program');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $program = Program::find($request->id);
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/img/program';
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$program->gambar);
        } else {
            $nama_file = $program->gambar;
        }

        Program::where('id',$request->id)->update([
            'nama' => $request->nama,
            'alias' => $request->alias,
            'keterangan' => $request->keterangan,
            'gambar' => $nama_file,
        ]);
        return back()->with('du','Program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        deletefile('public/img/program/'.$program->gambar);
        $program->delete();
        return back()->with('dd','Program');
    }
}
