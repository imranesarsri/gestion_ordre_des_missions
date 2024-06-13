<?php

namespace Database\Seeders\GestionParametres;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class MotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for the 'motifs' table
        $motifs = [
            [
                'nom' => 'Vacances',
                'description' => 'Congé pour les vacances annuelles.',
            ],
            [
                'nom' => 'Maladie',
                'description' => 'Congé pour raisons de santé.',
            ],
            [
                'nom' => 'Maternité',
                'description' => 'Congé pour les femmes enceintes.',
            ],
            [
                'nom' => 'Paternité',
                'description' => 'Congé pour les nouveaux pères.',
            ],
            [
                'nom' => 'Formation',
                'description' => 'Congé pour suivre une formation professionnelle.',
            ],
            [
                'nom' => 'Congé sans solde',
                'description' => 'Congé non payé pour des raisons personnelles.',
            ],
            [
                'nom' => 'Déménagement',
                'description' => 'Congé pour déménager.',
            ],
            [
                'nom' => 'Congé syndical',
                'description' => 'Congé pour participer à des activités syndicales.',
            ],
            [
                'nom' => 'Congé parental',
                'description' => 'Congé pour s\'occuper d\'un enfant.',
            ],
            [
                'nom' => 'Mariage',
                'description' => 'Congé pour son propre mariage.',
            ],
            [
                'nom' => 'Mission',
                'description' => 'Congé pour accomplir une mission professionnelle.',
            ],
            [
                'nom' => 'Congé spécial',
                'description' => 'Congé accordé dans des situations exceptionnelles.',
            ],
        ];

        DB::table('motifs')->insert($motifs);

        // ==========================================================
        // ============== Permission Motif Seder ===============
        // ==========================================================

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "MotifController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // ==========================================================
        // ================== Role Motif Seder =================
        // ==========================================================

        $adminRolePermissions = [
            "index-MotifController",
            "show-MotifController",
            "create-MotifController",
            "store-MotifController",
            "edit-MotifController",
            "update-MotifController",
            "destroy-MotifController",
            "export-MotifController",
            "import-MotifController",
        ];

        $adminRole = Role::findByName(User::ADMIN);
        $adminRole->givePermissionTo($adminRolePermissions);
    }
}