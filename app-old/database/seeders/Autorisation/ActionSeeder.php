<?php

namespace Database\Seeders\Autorisation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autorisation\Action;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class ActionSeeder extends Seeder
{
    public function run(): void
    {




        // ==========================================================
        // ================ Permission Action Seder ================
        // ==========================================================

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'SyncControllersActions'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "ActionController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }


        // ==========================================================
        // =================== Role Action Seder ===================
        // ==========================================================



        $AdminRolePermissions = [
            'index-ActionController',
            'show-ActionController',
            'create-ActionController',
            'store-ActionController',
            'update-ActionController',
            'edit-ActionController',
            'destroy-ActionController',
            'SyncControllersActions-ActionController',
        ];


        // Check if the role exists
        $AdminRole = Role::where('name', User::ADMIN)->first();
        if ($AdminRole) {
            // If the role exists, update its permissions
            $AdminRole->givePermissionTo($AdminRolePermissions);
        } else {
            // If the role doesn't exist, create it and give permissions
            $AdminRole = Role::create([
                'name' => User::ADMIN,
                'guard_name' => 'web',
            ]);
            $AdminRole->givePermissionTo($AdminRolePermissions);
        }


        // ==========================================================
        // ======= Create User if not exists and assign role ========
        // ==========================================================

        $AdminExiste = User::where('email', 'admin@gmail.com')->exists();
        if ($AdminExiste) {
            $addRoleAdmin = User::where('email', 'admin@gmail.com')->first();

            // Assign the role to the user
            if (!$addRoleAdmin ->hasRole(User::ADMIN)) {
                $addRoleAdmin ->assignRole(User::ADMIN);
            }
        } else {
            User::create([
                'prenom' => 'admin',
                'nom' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ])->assignRole(User::ADMIN);
        }







    }
}
