<?php

use Illuminate\Http\Request;

use App\Http\Resources\SongResource;
use App\Http\Resources\SongsCollection;
use App\Song;

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


Route::get('/songs/{song}', function(Song $song) {
    return new SongResource($song);
});

Route::get('/songs', function() {
    // return SongResource::collection(Song::all());
    return new SongsCollection(Song::all());
});