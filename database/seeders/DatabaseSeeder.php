<?php

namespace Database\Seeders;

use App\Models\User;
use Dataloft\Auto\Brand\Models\Brand;
use Dataloft\Auto\CarModel\Models\CarModel;
use Dataloft\Auto\Vehicle\Models\Vehicle;
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
    }

}
