<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\BlogPage;
use App\Livewire\SinglePostPage;

Route::get('/', HomePage::class)->name('home');
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('/{subCategory}/{slug}', SinglePostPage::class)->name('single-post');