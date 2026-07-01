<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Enterprise;
use App\Models\Social;

use Carbon\Carbon;
class Footer extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
        $enterprise = Enterprise::first();
        $socials = Social::where('status', true)->get();
        return view('livewire.components.footer', compact('enterprise', 'socials'));
    }
}
