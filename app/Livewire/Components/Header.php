<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Enterprise;
use App\Models\Social;
use App\Models\CampusLifePhoto;
use Carbon\Carbon;
class Header extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
        $enterprise = Enterprise::first();
        $socials = Social::where('status', true)->get();
          $campusLifePhotos = CampusLifePhoto::where('status', true)->inRandomOrder()->take(6)->get();
        return view('livewire.components.header', compact('enterprise', 'socials', 'campusLifePhotos'));
    }
}
