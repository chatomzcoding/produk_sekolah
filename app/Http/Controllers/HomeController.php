<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Program;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $menu   = 'dashboard';
        $statistik  = [
            'kontrak' => Siswa::count(),
            'timlokus' => Guru::count(),
            'pekerjaan' => Fasilitas::count(),
            'perusahaan' => Program::count(),
        ];
        return view('admin.dashboard', compact('menu','statistik'));
    }

}
