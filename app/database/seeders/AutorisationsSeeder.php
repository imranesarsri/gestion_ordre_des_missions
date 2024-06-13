<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\pkg_autorisations\{
    RoleSeeder,
};

class AutorisationsSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(self::Classes());
    }

    public static function Classes(): array
    {
        return [
            RoleSeeder::class,
        ];
    }
}
