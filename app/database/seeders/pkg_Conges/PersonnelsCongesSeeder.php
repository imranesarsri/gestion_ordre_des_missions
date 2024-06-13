<?php

namespace Database\Seeders\pkg_Conges;

use App\Models\pkg_PriseDeServices\Personnel;
use Illuminate\Database\Seeder;

class PersonnelsCongesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {        
        Personnel::find(1)->conges()->attach(1);
        Personnel::find(2)->conges()->attach(2);
        Personnel::find(1)->conges()->attach(5);
        Personnel::find(2)->conges()->attach(6);
        Personnel::find(3)->conges()->attach(3);
        Personnel::find(4)->conges()->attach(4);
        Personnel::find(1)->conges()->attach(8);
        Personnel::find(2)->conges()->attach(9);
        Personnel::find(3)->conges()->attach(10);
    }
}
