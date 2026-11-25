<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('biodata.index');
});

Route::resource('biodata', BiodataController::class)
    ->except(['show'])
    ->parameters(['biodata' => 'biodata']);
