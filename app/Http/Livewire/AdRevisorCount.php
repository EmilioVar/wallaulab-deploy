<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;

class AdRevisorCount extends Component
{
    protected $listeners = ['adCreated' => 'render'];

    public function render()
    {
        $adsRevisorCount = Ad::where('is_accepted', null)->count();
        return view('livewire.ad-revisor-count', compact('adsRevisorCount'));
    }
}
