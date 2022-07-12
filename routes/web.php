<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageBcwpController;
use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageImprint;
use App\Http\Controllers\PageNewsletterController;
use App\Http\Controllers\PagePostController;
use App\Http\Controllers\PagePrivacyLcaPolicyController;
use App\Http\Controllers\PagePrivacyLwPolicyController;
use App\Http\Controllers\PagePrivacyMpPolicyController;
use App\Http\Controllers\PagePrivacyPolicyController;
use App\Http\Controllers\PagePrivacyRpPolicyController;
use App\Http\Controllers\PageProductsController;
use App\Http\Controllers\PageSpeakingController;
use App\Http\Controllers\PageUsesController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use Spatie\Mailcoach\Http\Front\Controllers\SubscribeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::feeds();

Route::get('/', PageHomeController::class)
    ->name('page.home');
Route::get('speaking', PageSpeakingController::class)
    ->name('page.speaking');
Route::get('/category/{category}', PageCategoryController::class)
    ->name('page.category');

Route::get('/{year}/{month}/{slug}', PagePostController::class)
    ->name('page.post');

Route::get('/imprint', PageImprint::class)
    ->name('page.imprint');
Route::get('uses', PageUsesController::class)
    ->name('page.uses');
Route::get('newsletter', PageNewsletterController::class)
    ->name('page.newsletter');
Route::get('build-chatbots-with-php', PageBcwpController::class)
    ->name('page.bcwp');

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

// Mailcoach
Route::post('mailcoach-subscribe/{emailListUuid}', '\\' . SubscribeController::class)
    ->name('cr.mailcoach.subscribe')
    ->middleware(ProtectAgainstSpam::class);


