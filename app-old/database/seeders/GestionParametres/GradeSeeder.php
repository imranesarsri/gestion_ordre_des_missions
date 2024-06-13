<?php

namespace Database\Seeders\GestionParametres;

use App\Models\GestionParametres\Grade;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeData = [
            [
                'nom' => 'Exécution',
                'echell_debut' => 1,
                'echell_fin' => 6
            ],
            [
                'nom' => 'Exécution excellente',
                'echell_debut' => 7,
                'echell_fin' => 9
            ],
            [
                'nom' => 'Maitrise',
                'echell_debut' => 10,
                'echell_fin' => 12
            ],
            [
                'nom' => 'Maitrise principale',
                'echell_debut' => 13,
                'echell_fin' => 15
            ],
            [
                'nom' => 'Cadre',
                'echell_debut' => 16,
                'echell_fin' => 18
            ],
            [
                'nom' => 'Cadre principal',
                'echell_debut' => 19,
                'echell_fin' => 21
            ],
            [
                'nom' => 'Cadre superieur',
                'echell_debut' => 22,
                'echell_fin' => 30
            ],
        ];
        foreach ($gradeData as $data) {
            $gradeExists = Grade::where('nom', $data['nom'])->exists();
            if (!$gradeExists) {
                Grade::create($data);
            }
        }

        // ==========================================================
        // ============== Permission Grade Seder ===============
        // ==========================================================

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "GradeController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // ==========================================================
        // ================== Role Grade Seder =================
        // ==========================================================

        $adminRolePermissions = [
            "index-GradeController",
            "show-GradeController",
            "create-GradeController",
            "store-GradeController",
            "edit-GradeController",
            "update-GradeController",
            "destroy-GradeController",
            "export-GradeController",
            "import-GradeController",
        ];

        $adminRole = Role::findByName(User::ADMIN);
        $adminRole->givePermissionTo($adminRolePermissions);
    }
}