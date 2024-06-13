<?php

namespace Database\Seeders\Autorisation;

use App\Models\Autorisation\Action;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Repositories\Autorisation\RoleRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "RoleController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }


        Role::firstOrCreate(
            ['name' => User::ADMIN],
            ['guard_name' => 'web']
        )->givePermissionTo([
            'index-RoleController',
            'show-RoleController',
            'create-RoleController',
            'store-RoleController',
            'edit-RoleController',
            'update-RoleController',
            'destroy-RoleController',
            'export-RoleController',
            'import-RoleController',
        ]);

        Role::firstOrCreate(
            ['name' => User::ADMIN],
            ['guard_name' => 'web']
        )->givePermissionTo([
            'index-RoleController',
            'show-RoleController',
            'create-RoleController',
            'store-RoleController',
            'export-RoleController',
            'import-RoleController',
        ]);


    }





}
