<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Heading1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $id, public string $marginTop = '12')
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading1');
    }
}