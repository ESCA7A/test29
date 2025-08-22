<?php

use Dataloft\Auto\Vehicle\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('get', [Controller::class, 'index']);
