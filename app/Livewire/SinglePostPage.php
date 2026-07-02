<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Post;
use Livewire\Component;
#[Title('Actualité - U.PA.C')]
class SinglePostPage extends Component
{
     public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
        Carbon::setLocale('fr');
        $post=Post::where('slug', $this->slug)->firstOrFail();
        return view('livewire.single-post-page', compact('post'));
    }
}
