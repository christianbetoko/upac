<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\BlogPage;
use App\Livewire\ContactPage;
use App\Livewire\FaqPage;
use App\Livewire\AdmissionPage;
use App\Livewire\SinglePostPage;

Route::get('/', HomePage::class)->name('home');
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/faq', FaqPage::class)->name('faq');
Route::get('/admission', AdmissionPage::class)->name('admission');
Route::get('/{subCategory}/{slug}', SinglePostPage::class)->name('single-post');