<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GestionParametres\GradeSeeder;
use Database\Seeders\GestionParametres\MotifSeeder;
use Database\Seeders\GestionParametres\VilleSeeder;
use Database\Seeders\GestionParametres\FonctionSeeder;
use Database\Seeders\GestionParametres\AvancementSeeder;
use Database\Seeders\GestionParametres\SpecialiteSeeder;
use Database\Seeders\GestionParametres\EtablissementSeeder;

class ParametresSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ParametresSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            AvancementSeeder::class,
            EtablissementSeeder::class,
            FonctionSeeder::class,
            GradeSeeder::class,
            MotifSeeder::class,
            SpecialiteSeeder::class,
            VilleSeeder::class,
        ];
    }
}