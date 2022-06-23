<?php

namespace App\View\Components;

use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menu;
    public $title;

    public function __construct($menu='beranda',$title="sistem sekolah")
    {
        $this->menu = $menu;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        $user = Auth::user();
        $profil = Profil::first();
        return view('components.admin-layout', compact('user','profil'));
    }
}
