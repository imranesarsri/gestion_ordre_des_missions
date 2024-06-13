<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\pkg_Conges\{
    CongeSeeder,
    PersonnelsCongesSeeder,
};  

class CongesSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CongesSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            CongeSeeder::class,
            PersonnelsCongesSeeder::class,
            // CongesPermissionsSeeder::class,
        ];
    }
}