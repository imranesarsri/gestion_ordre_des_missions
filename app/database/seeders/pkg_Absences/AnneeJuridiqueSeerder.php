<?php

namespace Database\Seeders\pkg_Absences;

use App\Models\pkg_Absences\AnneeJuridique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AnneeJuridiqueSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        AnneeJuridique::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_Absences/AnneeJuridique.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                AnneeJuridique::create([
                    'annee' => $data[0],
                    'remarques' => $data[1],
                    'created_at' => $data[2],
                    'updated_at' => $data[3],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
