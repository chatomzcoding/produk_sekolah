<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Example extends Component
{
    public function render()
    {
        $kalimat    = "Selamat Datang di Laravel LiveWire";
        return view('livewire.example', compact('kalimat'));
    }
}
