<?php

use Illuminate\Support\Facades\Route;
use Dataloft\User\User\Controllers\Controller;

Route::get('get', [Controller::class, 'index']);
