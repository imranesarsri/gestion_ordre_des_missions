<?php

namespace Database\Seeders\pkg_OrderDesMissions;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_OrderDesMissions\MoyensTransport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoyensTransportsSeeder extends Seeder
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
        MoyensTransport::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_OrderDesMissions/moyens_transports/MoyensTransports.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                MoyensTransport::create([
                    "nom" => $data[0],
                    "remarque" => $data[1],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

    }
}