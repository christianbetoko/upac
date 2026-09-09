<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\BlogPage;
use App\Livewire\ContactPage;
use App\Livewire\FaqPage;
use App\Livewire\AdmissionPage;
use App\Livewire\SinglePostPage;
use App\Http\Controllers\FlexPayController;


Route::get('/', HomePage::class)->name('home');
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/faq', FaqPage::class)->name('faq');
Route::get('/admission', AdmissionPage::class)->name('admission');
Route::get('/{subCategory}/{slug}', SinglePostPage::class)->name('single-post');


// Webhook FlexPay (Désactiver la protection CSRF dans bootstrap/app.php pour cette route)
Route::post('/flexpay/callback', [FlexPayController::class, 'handleCallback'])->name('flexpay.callback');

// Redirections de paiement Carte
Route::get('/flexpay/approve', [FlexPayController::class, 'approve'])->name('flexpay.approve');
Route::get('/flexpay/cancel', [FlexPayController::class, 'cancel'])->name('flexpay.cancel');
Route::get('/flexpay/decline', [FlexPayController::class, 'decline'])->name('flexpay.decline');
Route::redirect('/evaluation-jour1', 'https://docs.google.com/forms/d/e/1FAIpQLSf2Vblhd6p9rC2_BVKkaOs7BiGWjr_i2YqsDE5Bsx2po1T4Eg/viewform?usp=sharing&ouid=102458774941756093843', 301)->name('evaluation-jour1');
Route::redirect('/evaluation-jour2', 'https://docs.google.com/forms/d/e/1FAIpQLSfKYPL_VbQgtcuqlpZzT6ORHpToiBpIw5TAJcPkEwpv5HLbCQ/viewform?usp=sharing&ouid=102458774941756093843', 301)->name('evaluation-jour2');
Route::redirect('/evaluation-jour3', 'https://docs.google.com/forms/d/e/1FAIpQLSezjHreAu-n2mmEh7Rll9F9GLhHW8PgOV8PjE7MdGV7195TUA/viewform?usp=sharing&ouid=102458774941756093843', 301)->name('evaluation-jour3');