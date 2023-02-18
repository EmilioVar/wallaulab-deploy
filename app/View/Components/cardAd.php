<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardAd extends Component
{
    public $ad;
    public $loop;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ad,$loop)
    {
        $this->ad = $ad;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-ad');
    }
}
