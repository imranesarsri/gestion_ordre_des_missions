<?php

namespace Database\Seeders\pkg_Conges;

use Spatie\Permission\Models\Permission;
use App\Models\pkg_Conges\Conge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class CongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // Conge::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFilePath = base_path("database/data/pkg_Conges/Conges/Conges.csv");
        $csvFile = fopen($csvFilePath, "r");
        if ($csvFile === false) {
            throw new \Exception("Unable to open file at path: $csvFilePath");
        }

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {

                if (count($data) < 3) {
                    Log::error("CSV row does not have enough columns", ['row' => $data]);
                    continue; 
                }
                try {
                    Conge::create([
                        "date_debut" => $data[0] ?? null,
                        "date_fin" => $data[1] ?? null,
                        "motif_id" => $data[2] ?? null,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error creating Conge record", [
                        'row' => $data,
                        'exception' => $e->getMessage(),
                    ]);
                }
            }
            $firstline = false;
        }
        fclose($csvFile);

        // ==========================================================
        // =========== Add Seeder Permission Assign Role ============
        // ==========================================================
        $csvFilePath = base_path("database/data/pkg_Conges/Conges/CongesPermissions.csv");
        $csvFile = fopen($csvFilePath, "r");
        if ($csvFile === false) {
            throw new \Exception("Unable to open file at path: $csvFilePath");
        }

        $firstLine = true;
        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstLine) {
                if (count($data) < 2) {
                    Log::error("CSV row does not have enough columns", ['row' => $data]);
                    continue; 
                }

                try {
                    $permissionName = $data[0] ?? null;
                    $permissionGuardName = $data[1] ?? null;

                    Permission::firstOrCreate([
                        "name" => $permissionName,
                        "guard_name" => $permissionGuardName,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error creating Permission record", [
                        'row' => $data,
                        'exception' => $e->getMessage(),
                    ]);
                }
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
