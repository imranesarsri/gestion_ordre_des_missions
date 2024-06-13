<?php

namespace Database\Factories\Pkg_OrderDesMissions;

use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MissionFactory extends Factory
{
    protected $model = Mission::class;

    public function definition()
    {
        return [
            'numero_mission' => '11234353',
            'nature' => 'nature 1',
            'lieu' => 'tanger',
            'type_de_mission' => "Voyage d'affaires",
            'numero_ordre_mission' => '124442',
            'data_ordre_mission' => '2023-05-01',
            'date_debut' => '2023-02-02',
            'date_fin' => '2023-02-10',
            'date_depart' => '2023-02-03',
            'heure_de_depart' => '10:00:00',
            'date_return' => '2023-02-11',
            'heure_de_return' => '10:00:00',
        ];
    }
}