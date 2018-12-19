<?php

use Illuminate\Http\Request;

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

Route::get('polls', 'PollsController@index');
Route::get('polls/{id}', 'PollsController@show');
Route::post('/polls', 'PollsController@store');
// PUT to update/replace a whole resource, PATCH to update part of the resource
Route::put('/polls/{poll}', 'PollsController@update');
Route::delete('/polls/{poll}', 'PollsController@destroy');
Route::any('/errors', 'PollsController@errors');

Route::apiResource('questions', 'QuestionsController');

// sub-resource: get all questions related to a specific poll
Route::get('polls/{poll}/questions', 'PollsController@questions');

