<?php

use Illuminate\Support\Facades\Route;
use Dataloft\Auto\Brand\Controllers\Controller;

Route::get('get', [Controller::class, 'index']);
