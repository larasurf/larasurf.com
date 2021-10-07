<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Heading3 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $id)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading3');
    }
}
