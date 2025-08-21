<?php

namespace Dataloft\Auto\Brand\Controllers;

use Dataloft\Auto\Brand\Models\Brand;

class Controller extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return Brand::all();
    }
}
