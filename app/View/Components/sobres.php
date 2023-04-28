<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sobres extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sobres;
    public function __construct($sobres = [])
    {
        $this->sobres = $sobres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sobres');
    }
}
