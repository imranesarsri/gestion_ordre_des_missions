<?php

namespace Tests\Feature\pkg_Conges;

use App\Exceptions\pkg_conges\CongeAlreadyExistException;
use Tests\TestCase;
use App\Models\pkg_Conges\Conge;
use App\Models\pkg_Parametres\Motif;
use App\Models\pkg_PriseDeServices\Personnel;
use App\Repositories\pkg_Conges\CongesRepository;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CongeTest extends TestCase
{
    use DatabaseTransactions;

    protected $congeRepository;
    protected $personnel;
    protected $motif;

    protected function setUp(): void
    {
        parent::setUp();
        $this->congeRepository = new CongesRepository(new Conge());
        $this->personnel = Personnel::factory()->create();
        $this->motif = Motif::factory()->create();
    }

    public function test_paginate_conges()
    {
        $conges = Conge::factory()->count(15)->create();
        foreach ($conges as $conge) {
            $conge->personnels()->attach($this->personnel->id);
        }

        $paginatedConges = $this->congeRepository->paginate();

        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $paginatedConges);
        $this->assertCount(10, $paginatedConges->items());
    }

    public function test_create_conge()
    {
        $congeData = [
            'date_debut' => '2024-05-14',
            'date_fin' => "2024-05-15",
            'motif_id' => $this->motif->id,
        ];

        $conge = Conge::create($congeData)->personnels()->attach($this->personnel->id);
        $this->assertDatabaseHas('conges', $congeData);
    }


    public function test_prevent_create_conge_already_exists()
    {
        $congeData = [
            'date_debut' => '2024-05-14',
            'date_fin' => "2024-05-15",
            'motif_id' => $this->motif->id,
        ];

        $existingConge = Conge::create($congeData);
        $existingConge->personnels()->attach($this->personnel->id);

        $congeData = [
            'personnel_id' => $this->personnel->id,
            'date_debut' => $congeData['date_debut'],
            'date_fin' => $congeData['date_fin'],
            'motif_id' => $this->motif->id,
        ];

        try {
            $this->congeRepository->create($congeData);
            $this->fail('Expected exception was not thrown');
        } catch (CongeAlreadyExistException $e) {
            $expectedMessage = __('Les congés existent déjà');
            $this->assertEquals($expectedMessage, $e->getMessage());
        } catch (Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }



    public function test_update_conge()
    {
        $congeData = [
            'date_debut' => '2024-05-14',
            'date_fin' => "2024-05-15",
            'motif_id' => $this->motif->id,
        ];

        $conge = Conge::create($congeData);
        $conge->personnels()->attach($this->personnel->id);

        $updateData = [
            'date_debut' => '2024-05-16',
            'date_fin' => '2024-05-17',
            'motif_id' => $this->motif->id,
        ];

        $personnel_id = $this->personnel->id;

        $congeUpdate = $this->congeRepository->update($conge->id, $updateData);

        if ($personnel_id != $congeUpdate->personnels()->first()->pivot->personnel_id) {
            $conge->personnels()->detach();
            $conge->personnels()->attach($personnel_id);
        }


        $this->assertDatabaseHas('conges', $updateData);
    }

    public function test_delete_conge()
    {
        $conge = Conge::factory()->create();
        $this->congeRepository->destroy($conge->id);
        $this->assertDatabaseMissing('conges', ['id' => $conge->id]);
    }

    public function test_searchData_conge()
    {
        $congeData = [
            'date_debut' => '2024-05-14',
            'date_fin' => "2024-05-15",
            'motif_id' => $this->motif->id,
        ];

        $conge = Conge::create($congeData)->personnels()->attach($this->personnel->id);
        $searchValue = '2024-05-14';
        $searchResults = $this->congeRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('date_debut', $searchValue));
    }
}
