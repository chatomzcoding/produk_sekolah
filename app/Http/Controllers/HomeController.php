<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kontrak;
use App\Models\Mapel;
use App\Models\Pekerjaan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\Timlokus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $menu   = 'dashboard';
        $statistik  = [
            'kontrak' => 1,
            'timlokus' => 2,
            'pekerjaan' => 3,
            'perusahaan' => 4,
        ];
        return view('admin.dashboard', compact('menu','statistik'));
    }

    public function migrasi()
    {
        $data   = DB::table('kelas_lama')->get();

        foreach ($data as $item) {
            Kelas::create([
                'nama_kelas' => $item->nama_kelas,
            ]);
        }
    }
    
}
