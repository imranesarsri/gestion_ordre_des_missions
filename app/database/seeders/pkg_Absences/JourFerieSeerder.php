<?php

namespace Database\Seeders\pkg_Absences;

use App\Models\pkg_Absences\JourFerie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JourFerieSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        JourFerie::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_Absences/JourFeries.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                JourFerie::create([
                    'annee_juridique_id' => $data[0],
                    'nom' => $data[1],
                    'date_debut' => $data[2],
                    'date_fin' => $data[3],
                    'is_formateur' => $data[4],
                    'is_administrateur' => $data[5],
                    'created_at' => $data[6],
                    'updated_at' => $data[7],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
