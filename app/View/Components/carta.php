<?php

namespace App\View\Components;

use Illuminate\View\Component;

class carta extends Component
{
    public $imagen;
    public $nombre;
    public $categoria;
    public $vida;
    public $dmg;
    public $coste;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imagen,$nombre,$categoria,$vida,$dmg,$coste)
    {
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->vida = $vida;
        $this->dmg = $dmg;
        $this->coste = $coste;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carta');
    }
}
