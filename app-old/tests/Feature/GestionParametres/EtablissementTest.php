<?php

namespace Tests\Feature\GestionParametres;

use Exception;
use Tests\TestCase;
use App\Models\User;
use App\Models\GestionParametres\Etablissement;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\GestionParametres\EtablissementRepository;
use App\Exceptions\GestionParametres\EtablissementAlreadyExistException;

class EtablissementTest extends TestCase
{
    use DatabaseTransactions;
    protected $etablissementRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->etablissementRepository = new EtablissementRepository(new Etablissement);
        $this->user = User::factory()->create();
    }


    public function test_paginate_etablissement()
    {
        $this->actingAs($this->user);
        Etablissement::factory()->count(7)->create();
        $etablissement = $this->etablissementRepository->paginate(2);
        $this->assertNotNull($etablissement);
    }

    public function test_create_etablissement()
    {
        $Data = [
            'nom' => 'Etablissement test',
            'description' => 'Etablissement description test',
        ];
        $etablissement = $this->etablissementRepository->create($Data);
        $this->assertEquals($Data['nom'], $etablissement->nom);
    }


    public function test_create_etablissement_already_exist()
    {

        $ExistingEtablissement = Etablissement::factory()->create();
        $EtablissementData = [
            'nom' => $ExistingEtablissement->nom,
            'description' => 'description motif',
        ];

        try {
            $this->etablissementRepository->create($EtablissementData);
            $this->fail('Expected Exceptions was not thrown');
        } catch (EtablissementAlreadyExistException $e) {
            $this->assertEquals(__('GestionParametres/Etablissement/message.etablissementAlreadyExists'), $e->getMessage());
        } catch (Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }


    public function test_update_etablissement()
    {
        $ExistingEtablissement = Etablissement::factory()->create();
        $etablissementData = [
            'nom' => 'etablissement updated',
            'description' => 'description etablissement updated',
        ];
        $this->etablissementRepository->update($ExistingEtablissement->id, $etablissementData);
        $this->assertDatabaseHas('etablissements', $etablissementData);
    }


    public function test_delete_etablissement()
    {
        $etablissement = Etablissement::factory()->create();
        $this->etablissementRepository->destroy($etablissement->id);
        $this->assertDatabaseMissing('etablissements', ['id' => $etablissement->id]);
    }


}
