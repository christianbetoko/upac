<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Comment;
use Livewire\WithPagination;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Url;
#[Title('Blog - U.PA.C')]
class BlogPage extends Component
{
     use WithPagination; // 2. Utiliser le trait
    // 3. Définir le thème sur Bootstrap
    protected $paginationTheme = 'bootstrap';
    #[Url]
    public $selected_category = [];
     #[Url]
     public $searchTerm = '';
    public function render()
    {
        Carbon::setLocale('fr');
         $paginate=6;
         $recent_posts=Post::orderBy('published_at','DESC')->where('status','published')
        ->limit(5) 
        ->get();
        $categories = SubCategory::whereHas('posts', function ($query) { $query->where('status', 'published') ; })->get();
        if(!empty($this->searchTerm))
        {
             $posts=Post::orderBy('published_at','DESC')->where('status','published')
            ->where('title','like','%'.$this->searchTerm.'%')
            
            ->paginate($paginate);
        }
        elseif(!empty($this->selected_category))
        {
             $posts=Post::orderBy('published_at','DESC')->where('status','published')
            ->whereIn('sub_category_id',$this->selected_category)
            
            ->paginate($paginate);
        }
        else{
             $posts=Post::orderBy('published_at','DESC')->where('status','published')->paginate($paginate);
        }
        
        $comments=Comment::where('is_visible',true)->get();
        return view('livewire.blog-page', compact('posts', 'categories', 'recent_posts', 'comments'));
    }
}
