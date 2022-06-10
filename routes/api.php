<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("auth", "API\CondidatureController@Authentication");
Route::get("get_candidate", "API\CondidatureController@GetCandidateCById");
Route::get("GetCandidateDetails", "API\CondidatureController@GetCandidateDetails");
Route::get("GetAllCandidate", "API\CondidatureController@GetAllCandidate");
