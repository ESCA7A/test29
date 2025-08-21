<?php

namespace Dataloft\Auto\CarModel\Controller;

use Dataloft\Auto\CarModel\Models\CarModel;

class Controller extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return CarModel::all();
    }
}
