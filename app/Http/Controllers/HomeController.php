<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Pekerjaan;
use App\Models\Perusahaan;
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
    
}
