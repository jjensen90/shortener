<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::bind('url', function($value)
{
    $url = Shortener\Models\Url::where('shortened_url', $value)->first();
    if ($url) {
        return $url;
    }
    abort(404);
});

Route::get('/', [
    'as'   => 'urls.create',
    'uses' =>  '\Shortener\Controllers\UrlController@create'
]);
Route::post('/url', [
    'as'   => 'urls.store',
    'uses' =>  '\Shortener\Controllers\UrlController@store'
]);
Route::get('/view/{url}', [
    'as'   => 'urls.show',
    'uses' =>  '\Shortener\Controllers\UrlController@show'
]);
Route::get('/{slug}', [
    'as'   => 'urls.get',
    'uses' =>  '\Shortener\Controllers\UrlController@get'
]);