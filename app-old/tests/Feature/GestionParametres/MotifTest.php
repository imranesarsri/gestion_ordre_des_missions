<?php

namespace Tests\Feature\GestionParametres;

use App\Exceptions\GestionParametres\MotifAlreadyExistException;
use App\Models\GestionParametres\Motif;
use App\Models\User;
use App\Repositories\GestionParametres\MotifsRepository;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class MotifTest extends TestCase
{
    use DatabaseTransactions;
    protected $motifRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->motifRepository = new MotifsRepository(new Motif);
        $this->user = User::factory()->create();
    }

    public function test_paginate_motif()
    {
        $this->actingAs($this->user);
        motif::factory()->create();
        $motif = $this->motifRepository->paginate();
        $this->assertNotNull($motif);
    }


    public function test_create_motif()
    {
        $motifData = [
            'nom' => 'test',
            'description' => 'description motifs',
        ];
        $motif = $this->motifRepository->create($motifData);
        $this->assertEquals($motifData['nom'], $motif->nom);
    }

    public function test_prevent_create_motif_alraedy_exists()
    {
        $existingmotif = motif::factory()->create(); // Create a motif
        $motifData = [
            'nom' => $existingmotif->nom, // Use the name of the existing motif
            'description' => 'description motif',
        ];

        try {
            $this->motifRepository->create($motifData); 
            $this->fail('Expected Exceptions was not thrown');
        } catch (MotifAlreadyExistException $e) {
            $this->assertEquals(__('GestionParametre/motif/message.createMotifException'), $e->getMessage());
        } catch (Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    public function test_update_motif()
    {
        $motif = motif::factory()->create();
        $motifData = [
            'nom' => 'motif',
            'description' => 'description motif',
        ];
        $this->motifRepository->update($motif->id, $motifData);
        $this->assertDatabaseHas('motifs', $motifData);
    }


    public function test_delete_motif()
    {
        $motif = motif::factory()->create();
        $this->motifRepository->destroy($motif->id);
        $this->assertDatabaseMissing('motifs', ['id' => $motif->id]);
    }

    public function test_searchData_motif()
    {
        $motifData = [
            'nom' => 'motif',
            'description' => 'description motif',
        ];
        $data = $this->motifRepository->create($motifData);
        $searchValue = 'motif';
        $searchResults = $this->motifRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }
}