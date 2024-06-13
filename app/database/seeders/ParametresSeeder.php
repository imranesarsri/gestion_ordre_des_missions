<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\pkg_Parametres\{
    GradeSeeder,
    MotifSeeder,
    VilleSeeder,
    FonctionSeeder,
    AvancementSeeder,
    SpecialiteSeeder,
    EtablissementSeeder,
};

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