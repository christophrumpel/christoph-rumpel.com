<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Mailcoach\Domain\Audience\Models\EmailList;
use Spatie\Mailcoach\Domain\Audience\Models\Subscriber;

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

    $attributes = $request->only(['email']);
    $emailList = EmailList::findByUuid(getenv('MAILCOACH_MASTERING_PHPSTORM_LIST_UUID'));

    if ($emailList->isSubscribed($attributes['email'])) {
        return response()->json(['already_subscribed' => true]);
    }

    Subscriber::createWithEmail($attributes['email'])
        ->subscribeTo($emailList);

    return response()->json(['already_subscribed' => false]);
});

Route::middleware('auth:api')->post('/newsletter/mastering-phpstorm/confirmed', function (Request $request) {

    $emailList = EmailList::findByUuid(getenv('MAILCOACH_MASTERING_PHPSTORM_LIST_UUID'));
    $subscriber = Subscriber::findForEmail($request->get('email'), $emailList);

    $confirmed = $subscriber && $subscriber->status === 'subscribed';

    return response()->json(['confirmed' => $confirmed]);
});

Route::middleware('auth:api')->post('/newsletter/mastering-phpstorm/add-bought-tag', function (Request $request) {

    $emailList = EmailList::findByUuid(getenv('MAILCOACH_MASTERING_PHPSTORM_LIST_UUID'));
    $subscriber = Subscriber::findForEmail($request->get('email'), $emailList);

    if (!$subscriber) {
        return response()->json(['email not found'], 404);
    }

    $subscriber->addTag('purchased');

    return response()->json(['']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
