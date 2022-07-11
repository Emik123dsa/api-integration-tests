<?php

use App\Http\Controllers\Api\TaxController;
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

Route::group(
    ['namespace' => 'App\Http\Controllers\Api', 'prefix' => 'v1'],
    static function () {
        Route::get('/taxes', [
            'as' => 'getAllTaxes',
            'uses' => 'TaxController@getAllTaxes',
        ]);

        Route::get('/taxes/{id}/identifications', [
            'uses' => 'TaxIdentificationNumberController@index',
            'as' => 'taxIdentificationNumber',
        ]);
    }
);
