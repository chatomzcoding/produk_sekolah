<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $no;
    public $label;
    public $wajib;
    public $ket;

    public function __construct($no=1,$label='',$wajib="TRUE",$ket=NULL)
    {
        $this->no = $no;
        $this->label = $label;
        $this->wajib = $wajib;
        $this->ket = $ket;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
