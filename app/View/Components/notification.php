<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notification extends Component
{
    public $type;
    public $time;
    public $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$time,$content)
    {
        $this->$type = $type;
        $this->$time = $time;
        $this->$content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
