<?php

namespace Database\Seeders\pkg_OrderDesMissions;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_OrderDesMissions\Transports;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ==========================================================
        // ============== Add Seeder Moyens Transports ==============
        // ==========================================================
        Schema::disableForeignKeyConstraints();
        Transports::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_OrderDesMissions/transports/Transports.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Transports::create([
                    "transport_utiliser" => $data[0],
                    "marque" => $data[1],
                    "numiro_plaque" => $data[2],
                    "puissance_fiscal" => $data[3],
                    "user" => $data[4],
                    "moyens_transports_id" => $data[5],
                    "mission_id" => $data[6],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

    }
}