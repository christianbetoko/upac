<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Slide;
use App\Models\CampusLifePhoto;
use App\Models\Post;
use Livewire\WithPagination;
use Carbon\Carbon;
#[Title('Accueil - U.PA.C')]
class HomePage extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
        $slides = Slide::where('status', true)->get();
        $posts = Post::where('status', 'published')->latest()->take(4)->get();
        $campusLifePhotos = CampusLifePhoto::where('status', true)->inRandomOrder()->take(4)->get();
        return view('livewire.home-page', compact('slides', 'posts', 'campusLifePhotos'));
    }
}
