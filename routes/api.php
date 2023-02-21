<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.v1.', 'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers\Api\V1\Site'], function () {

    Route::get('import_hotel_data', 'ApiController@import_hotel_data')
        ->name('import_hotel_data');

    Route::get('get_search_logs', 'ApiController@get_search_logs')
        ->name('get_search_logs');

});