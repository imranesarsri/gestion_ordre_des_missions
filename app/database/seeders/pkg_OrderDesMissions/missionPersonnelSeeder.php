<?php

namespace Database\Seeders\pkg_OrderDesMissions;


use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MissionPersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(1)->missions()->attach(1);
        User::find(2)->missions()->attach(1);
        User::find(1)->missions()->attach(2);
        User::find(2)->missions()->attach(2);
        User::find(3)->missions()->attach(2);
        User::find(3)->missions()->attach(3);
        User::find(4)->missions()->attach(3);
        User::find(4)->missions()->attach(4);
        User::find(1)->missions()->attach(5);
        User::find(2)->missions()->attach(5);
        User::find(3)->missions()->attach(5);
        User::find(4)->missions()->attach(5);
        User::find(1)->missions()->attach(6);
        User::find(2)->missions()->attach(6);
        User::find(4)->missions()->attach(6);
        User::find(2)->missions()->attach(7);
        User::find(1)->missions()->attach(8);
        User::find(2)->missions()->attach(8);
        User::find(3)->missions()->attach(8);
        User::find(1)->missions()->attach(9);
        User::find(2)->missions()->attach(9);
        User::find(3)->missions()->attach(9);
    }
}