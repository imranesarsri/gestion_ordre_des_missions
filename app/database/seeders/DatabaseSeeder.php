<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AutorisationsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ParametresSeeder::class);
        $this->call(Pkg_OrderDesMissionsSeeder::class);

    }
}