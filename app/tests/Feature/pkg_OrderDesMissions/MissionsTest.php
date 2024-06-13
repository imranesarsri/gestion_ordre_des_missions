<?php

namespace Tests\Feature\pkg_OrderDesMissions;

use Tests\TestCase;
use App\Models\User;
use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\pkg_OrderDesMissions\Transports;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Pkg_OrderDesMissions\MissionsRepositories;

class MissionsTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Le référentiel de missions utilisé pour les tests.
     *
     * @var MissionsRepositories
     */
    protected $missionsRepositories;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
     */
    protected $user;
    protected $transports;

    /**
     * Met en place les préconditions pour chaque test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->missionsRepositories = new MissionsRepositories();
        // $this->user = User::factory()->create();
        // $this->transports = Transports::factory()->create();
    }

    public function test_paginate_missions()
    {
        $mission = [
            'numero_mission' => '99651',
            'nature' => 'nature 1',
            'lieu' => 'tanger',
            'type_de_mission' => "Voyage d'affaires",
            'numero_ordre_mission' => '124442',
            'data_ordre_mission' => '2024-05-01',
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-10',
            'date_depart' => '2024-05-03',
            'heure_de_depart' => '10:00:00',
            'date_return' => '2024-05-11',
            'heure_de_return' => '10:00:00',
        ];
        $this->missionsRepositories->create($mission);
        $this->assertDatabaseHas('missions', $mission);
        $missions = $this->missionsRepositories->paginate();
        $this->assertNotNull($missions);
    }

    /**
     * Teste la création d'un mission.
     */
    public function test_create_mission()
    {
        $data = [
            'numero_mission' => '212121',
            'nature' => 'nature 1',
            'lieu' => 'tanger',
            'type_de_mission' => "Voyage d'affaires",
            'numero_ordre_mission' => '124442',
            'data_ordre_mission' => '2024-05-01',
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-10',
            'date_depart' => '2024-05-03',
            'heure_de_depart' => '10:00:00',
            'date_return' => '2024-05-11',
            'heure_de_return' => '10:00:00',
        ];
        $mision = $this->missionsRepositories->create($data);
        $this->assertEquals($data['numero_mission'], $mision->numero_mission);
        $this->assertDatabaseHas('missions', $data);
    }

    /**
     * Teste la mise à jour d'un mission.
     */
    public function test_update_mission()
    {
        $mission = Mission::factory()->create();
        $data = [
            'numero_mission' => '99651',
            'nature' => 'nature 1',
            'lieu' => 'tanger',
            'type_de_mission' => "Voyage d'affaires",
            'numero_ordre_mission' => '124442',
            'data_ordre_mission' => '2024-05-01',
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-10',
            'date_depart' => '2024-05-03',
            'heure_de_depart' => '10:00:00',
            'date_return' => '2024-05-11',
            'heure_de_return' => '10:00:00',
        ];
        $this->missionsRepositories->update($mission->id, $data);
        $this->assertDatabaseHas('missions', $data);
    }

    /**
     * Teste la suppression d'un mission.
     */
    public function test_delete_mission()
    {
        $mission = Mission::factory()->create();
        $this->missionsRepositories->destroy($mission->id);
        $this->assertDatabaseMissing('missions', ['id' => $mission->id]);
    }


}