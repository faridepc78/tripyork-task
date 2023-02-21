<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'],
    'namespace' => 'App\Http\Controllers\Web\Site'], function () {

    Route::get('/', 'MainController@home')
        ->name('home');

    Route::get('search', 'MainController@search')
        ->name('search');

});
