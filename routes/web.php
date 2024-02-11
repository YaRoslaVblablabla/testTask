<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IphoneController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iphones', [IphoneController::class, 'fetch']);