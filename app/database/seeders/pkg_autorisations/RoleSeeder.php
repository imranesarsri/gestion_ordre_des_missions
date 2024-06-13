<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => User::ADMIN]);
        Role::create(['name' => User::RESPONSABLE]);
    }
}
