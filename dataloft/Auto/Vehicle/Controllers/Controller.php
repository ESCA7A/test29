<?php

namespace Dataloft\Auto\Vehicle\Controllers;

use Dataloft\Auto\Vehicle\Models\Vehicle;

class Controller extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return Vehicle::all();
    }
}
