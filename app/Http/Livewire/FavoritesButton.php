<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesButton extends Component
{
    public $ad;

    public function mount($ad) {
        $this->ad = $ad;
    }

    public function adFavorite(User $user, Ad $ad) {
        if($user->ads_favorites()->where('ads.id', $ad->id)->exists()){
            $user->ads_favorites()->detach($ad);
        } else{
            $user->ads_favorites()->attach($ad);
        } 
    }
    public function render()
    {
        return view('livewire.favorites-button');
    }
}
