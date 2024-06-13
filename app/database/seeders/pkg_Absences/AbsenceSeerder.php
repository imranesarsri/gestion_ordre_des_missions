<?php

namespace Database\Seeders\pkg_Absences;

use App\Models\pkg_Absences\Absence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AbsenceSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Absence::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_Absences/Absences.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Absence::create([
                    'date_debut' => $data[0],
                    'date_fin' => $data[1],
                    'remarques' => $data[2],
                    'user_id' => $data[3],
                    'motif_id' => $data[4],
                    'created_at' => $data[5],
                    'updated_at' => $data[6],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
