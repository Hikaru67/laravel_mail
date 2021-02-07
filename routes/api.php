<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$namespace = '\App\Http\Controllers';
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => $namespace], function(){
    Route::apiResource('candidate','CandidateController');
    Route::apiResource('template', 'TemplateController');
});

Route::post('send-mail','MailThankController@sendMail');