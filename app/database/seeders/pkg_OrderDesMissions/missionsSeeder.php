<?php

namespace Database\Seeders\pkg_OrderDesMissions;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ==========================================================
        // ================= Add Seeder Technologies ================
        // ==========================================================
        Schema::disableForeignKeyConstraints();
        Mission::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_OrderDesMissions/missions/Missions.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                // Convert dates from DD/MM/YYYY to YYYY-MM-DD
                $data_ordre_mission = DateTime::createFromFormat('d/m/Y', $data[5])->format('Y-m-d');
                $date_debut = DateTime::createFromFormat('d/m/Y', $data[6])->format('Y-m-d');
                $date_fin = DateTime::createFromFormat('d/m/Y', $data[7])->format('Y-m-d');
                $date_depart = DateTime::createFromFormat('d/m/Y', $data[8])->format('Y-m-d');
                $date_return = DateTime::createFromFormat('d/m/Y', $data[10])->format('Y-m-d');
                $heure_de_depart = $data[9];
                $heure_de_return = $data[11];

                Mission::create([
                    "numero_mission" => $data[0],
                    "nature" => $data[1],
                    "lieu" => $data[2],
                    "type_de_mission" => $data[3],
                    "numero_ordre_mission" => $data[4],
                    "data_ordre_mission" => $data_ordre_mission,
                    "date_debut" => $date_debut,
                    "date_fin" => $date_fin,
                    "date_depart" => $date_depart,
                    "heure_de_depart" => $heure_de_depart,
                    "date_return" => $date_return,
                    "heure_de_return" => $heure_de_return,
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);



        // ==========================================================
        // =========== Add Seeder Permission Assign Role ============
        // ==========================================================
        $responsableRoleName = User::RESPONSABLE; // Change this to match the role name in your database

        // Find or create the responsable role
        $responsableRole = Role::firstOrCreate([
            'name' => $responsableRoleName,
            'guard_name' => 'web',
        ]);

        $csvFile = fopen(base_path("database/data/pkg_OrderDesMissions/missions/MissionsPermissions.csv"), "r");
        $firstLine = true;

        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstLine) {
                $permissionName = $data[0];
                $permissionGuardName = $data[1];

                // Skip the line with 'imprimer-MissionController'
                if ($permissionName === 'certificate-MissionsController') {
                    continue;
                }

                // Find or create the permission
                $permission = Permission::firstOrCreate([
                    "name" => $permissionName,
                    "guard_name" => $permissionGuardName,
                ]);

                // Assign the permission to the responsable role
                $responsableRole->givePermissionTo($permission);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}