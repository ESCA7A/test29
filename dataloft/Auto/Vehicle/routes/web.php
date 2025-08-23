<?php

use Dataloft\Auto\Vehicle\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('get', [Controller::class, 'index']);
Route::post('create', [Controller::class, 'create']);
Route::patch('update', [Controller::class, 'update']);
Route::delete('delete/{id}', [Controller::class, 'delete']);
