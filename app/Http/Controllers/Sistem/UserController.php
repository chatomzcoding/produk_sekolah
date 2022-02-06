<?php

namespace App\Http\Controllers\Sistem;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin')->only('index');
    }

    public function index()
    {
        $menu   = 'user';
        $user   = User::all();
        return view('admin.user.index', compact('menu','user'));
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
            'name' => ['required', 'string', 'max:255'],
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:1000',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img/user';
        // isi dengan nama folder tempat kemana file diupload
        $file->move($tujuan_upload,$nama_file);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'photo' => $nama_file,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('ds','User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $menu   = 'pengaturanuser';
        $user   = User::find(Crypt::decryptString($user));
        return view('sistem.user.edit', compact('menu','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user   = User::find($request->id);
        
        if ($request->email <> $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

       
        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:1000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'img/user';
            // isi dengan nama folder tempat kemana file diupload
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$user->photo);
        } else {
            $nama_file = $user->photo;
        }

        if (isset($request->password)) {
            $request->validate([
                'password' => 'min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
            ]);
            User::where('id',$user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'photo' => $nama_file,
                'password' => Hash::make($request->password),
            ]);
            
            
        } else {
            User::where('id',$user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'photo' => $nama_file,
            ]);
        }

        return redirect()->back()->with('du','User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user   = User::find($user);
        deletefile('img/user/'.$user->photo);
        $user->delete();
        return redirect()->back()->with('dd','User');
    }
}
