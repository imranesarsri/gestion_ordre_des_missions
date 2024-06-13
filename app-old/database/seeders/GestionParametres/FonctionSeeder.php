<?php

namespace Database\Seeders\GestionParametres;

use App\Models\GestionParametres\Fonction;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fonctionData = [
            [
                'nom' => 'Formateur',
                'description' => '',
            ],
            [
                'nom' => 'Administrateur',
                'description' => ''
            ]
        ];
        foreach ($fonctionData as $data) {
            $fonctionExists = Fonction::where('nom', $data['nom'])->exists();
            if (!$fonctionExists) {
                Fonction::create($data);
            }
        }

        // ==========================================================
        // ============== Permission Fonction Seder ===============
        // ==========================================================

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "FonctionController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // ==========================================================
        // ================== Role Fonction Seder =================
        // ==========================================================

        $adminRolePermissions = [
            "index-FonctionController",
            "show-FonctionController",
            "create-FonctionController",
            "store-FonctionController",
            "edit-FonctionController",
            "update-FonctionController",
            "destroy-FonctionController",
            "export-FonctionController",
            "import-FonctionController",
        ];

        $adminRole = Role::findByName(User::ADMIN);
        $adminRole->givePermissionTo($adminRolePermissions);
    }
}