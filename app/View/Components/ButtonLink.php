<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $href, public string $id = '', public string $rounding = 'none', public string $color = 'black', public string $paddingX = '5', public string $paddingY = '3')
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-link');
    }
}
