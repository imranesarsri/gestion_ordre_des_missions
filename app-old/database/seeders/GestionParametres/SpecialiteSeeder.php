<?php

namespace Database\Seeders\GestionParametres;

use App\Models\GestionParametres\Specialite;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialiteData = [
            [
                'nom' => 'Développeur',
                'description' => '',
            ],
            [
                'nom' => 'comptable',
                'description' => ''
            ]
        ];
        foreach ($specialiteData as $data) {
            $specialiteExists = Specialite::where('nom', $data['nom'])->exists();
            if (!$specialiteExists) {
                Specialite::create($data);
            }
        }


        // ==========================================================
        // ============== Permission Specialite Seder ===============
        // ==========================================================

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "SpecialiteController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // ==========================================================
        // ================== Role Specialite Seder =================
        // ==========================================================

        $adminRolePermissions = [
            "index-SpecialiteController",
            "show-SpecialiteController",
            "create-SpecialiteController",
            "store-SpecialiteController",
            "edit-SpecialiteController",
            "update-SpecialiteController",
            "destroy-SpecialiteController",
            "export-SpecialiteController",
            "import-SpecialiteController",
        ];

        $adminRole = Role::findByName(User::ADMIN);
        $adminRole->givePermissionTo($adminRolePermissions);
    }
}