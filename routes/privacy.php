<?php



/*
|--------------------------------------------------------------------------
| Privacy Routes
|--------------------------------------------------------------------------
|
*/

use App\Http\Controllers\PagePrivacyLcaPolicyController;
use App\Http\Controllers\PagePrivacyLwPolicyController;
use App\Http\Controllers\PagePrivacyMpPolicyController;
use App\Http\Controllers\PagePrivacyPolicyController;
use App\Http\Controllers\PagePrivacyRpPolicyController;
use Illuminate\Support\Facades\Route;

Route::get('/privacy-policy', PagePrivacyPolicyController::class)
    ->name('page.privacy-policy');
Route::get('/privacy-policy-lca', PagePrivacyLcaPolicyController::class)
    ->name('page.privacy-policy-lca');
Route::get('/privacy-policy-mp', PagePrivacyMpPolicyController::class)
    ->name('page.privacy-policy-mp');
Route::get('/privacy-policy-lw', PagePrivacyLwPolicyController::class)
    ->name('page.privacy-policy-lw');
Route::get('/privacy-policy-rp', PagePrivacyRpPolicyController::class)
    ->name('page.privacy-policy-lw');


