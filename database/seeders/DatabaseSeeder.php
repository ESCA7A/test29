<?php

namespace Database\Seeders;

use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\Vehicle\Models\Vehicle;
use Dataloft\User\User\Models\User;
use Dataloft\User\VehicleAccess\Models\VehicleAccess;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::query()->count('id') < 10) {
            User::factory(10)->create();
        }

        if (Brand::query()->count('id') < 10) {
            Brand::factory(10)->create();
        }

        if (CarModel::query()->count('id') < 50) {
            CarModel::factory(50)->create();
        }

        if (Vehicle::query()->count('id') < 200) {
            Vehicle::factory(200)->create();
        }

        if (VehicleAccess::query()->count('id') < 100) {
            VehicleAccess::factory(100)->create();
        }
    }
}
