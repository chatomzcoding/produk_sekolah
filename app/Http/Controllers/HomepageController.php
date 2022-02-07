<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Infowebsite;
use App\Models\Profil;
use App\Models\Program;
use App\Models\Slider;
use App\Models\Tagline;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $kontak = Infowebsite::first();
        $tagline    = Tagline::limit(4)->get();
        $guru    = Guru::limit(4)->get();
        $jurusan    = Program::limit(3)->get();
        $fasilitas    = Fasilitas::limit(3)->get();
        $slider    = Slider::all();
        $profil         = Profil::first();
        $artikel        = Artikel::orderBy('id','DESC')->first();
        $listartikel    = Artikel::where('id','<>',$artikel->id)->limit(3)->orderBy('id','DESC')->get();
        $data           = [
            'artikel' => $artikel,
            'listartikel' => $listartikel,
        ];
        return view('homepage.index', compact('kontak','tagline','jurusan','fasilitas','guru','slider','profil','data'));
    }

    public function artikel()
    {
        $kontak     = Infowebsite::first();
        $artikel    = Artikel::all();
        return view('homepage.blog.index', compact('kontak','artikel'));
    }

    public function showartikel($id)
    {
        $kontak         = Infowebsite::first();
        $artikel        = Artikel::find($id);
        $listartikel    = Artikel::where('id','<>',$id)->limit(3)->get();
        return view('homepage.blog.show', compact('kontak','artikel','listartikel'));
    }

    public function kontak()
    {
        $kontak         = Infowebsite::first();
        return view('homepage.kontak', compact('kontak'));
    }

    public function profil()
    {
        $profil         = Profil::first();
        return view('homepage.profil', compact('profil'));
    }

    public function program()
    {
        $program         = Program::all();
        return view('homepage.program', compact('program'));
    }
    public function guru()
    {
        $guru         = Guru::all();
        return view('homepage.guru', compact('guru'));
    }
    public function fasilitas()
    {
        $fasilitas         = Fasilitas::all();
        return view('homepage.fasilitas', compact('fasilitas'));
    }

    public function infoprofil($sesi)
    {
        switch ($sesi) {
            case 'sejarah':
                $profil         = Profil::first();
                return view('homepage.info.sejarah', compact('profil'));
                break;
            case 'visimisi':
                $profil         = Profil::first();
                return view('homepage.info.visimisi', compact('profil'));
                break;
            case 'tugasfungsi':
                $profil         = Profil::first();
                return view('homepage.info.tugasfungsi', compact('profil'));
                break;
            case 'profilpimpinan':
                $profil         = Profil::first();
                return view('homepage.info.profilpimpinan', compact('profil'));
                break;
            case 'strukturorganisasi':
                $profil         = Profil::first();
                return view('homepage.info.strukturorganisasi', compact('profil'));
                break;
            
            default:
                return 'belum ada sesi';
                break;
        }
    }
    public function informasi($sesi)
    {
        switch ($sesi) {
            case 'artikel':
                $kontak     = Infowebsite::first();
                $artikel    = Artikel::all();
                return view('homepage.blog.index', compact('kontak','artikel'));
                break;
            
            default:
                return 'belum ada sesi';
                break;
        }
    }
}
