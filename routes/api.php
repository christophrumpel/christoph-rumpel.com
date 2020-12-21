<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Mailcoach\Models\EmailList;
use Spatie\Mailcoach\Models\Subscriber;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/newsletter/mastering-phpstorm/count', function (Request $request) {
    $emailList = EmailList::findByUuid(getenv('MAILCOACH_MASTERING_PHPSTORM_LIST_UUID'));
    return response()->json(['count' => $emailList->subscribers()->count()]);
});

Route::middleware('auth:api')->post('/newsletter/mastering-phpstorm/subscribe', function (Request $request) {

    $attributes = $request->only(['email', 'tags']);
    $emailList = EmailList::findByUuid(getenv('MAILCOACH_MASTERING_PHPSTORM_LIST_UUID'));
    Subscriber::createWithEmail($attributes['email'])
        ->syncTags($attributes['tags'])
        ->subscribeTo($emailList);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
