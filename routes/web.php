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