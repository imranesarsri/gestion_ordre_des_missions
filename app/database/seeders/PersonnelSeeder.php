<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\pkg_PriseDeServices\{
    PersonnelsSeeder
};

class PersonnelSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PersonnelSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            PersonnelsSeeder::class
        ];
    }
}