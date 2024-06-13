<?php

namespace Tests\Feature\pkg_PriseDeServices;

use App\Models\pkg_PriseDeServices\Personnel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_PriseDeServices\PersonnelRepository;
use Tests\TestCase;
use App\Exceptions\pkg_PriseDeServices\PersonnelAlreadyExistException;

class PersonnelTest extends TestCase
{
    use DatabaseTransactions;
    protected $personnelRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->personnelRepository = new PersonnelRepository(new Personnel);
        $this->user = Personnel::factory()->create();
    }

    public function test_get_paginated_personnels()
    {
        $this->actingAs($this->user);
        $personnel = Personnel::factory()->create();
        $personnels = $this->personnelRepository->paginate();
        $this->assertNotNull($personnels);
    }


    public function test_create_personnel()
    {
        $this->actingAs($this->user);
        $personnelData = [
            'nom' => 'El Amrani',
            'prenom' => 'Fatima',
            'nom_arab' => 'العمراني',
            'prenom_arab' => 'فاطمة',
            'cin' => 'AB123456',
            'date_naissance' => '1990-03-25',
            'telephone' => '0654321098',
            'email' => 'fatima.elamrani@example.com',
            'address' => 'Rue Mohamed V, Casablanca',
            'images' => 'image.jpg',
            'matricule' => '654321',
            'ville_id' => 1, 
            'fonction_id' => 1,
            'ETPAffectation_id' => 1,
            'specialite_id' => 1,
            'etablissement_id' => 1, 
            'avancement_id' => 1 
        ];
        

        $personnel = $this->personnelRepository->create($personnelData);
        $this->assertEquals($personnelData['nom'], $personnel->nom);
    }

    public function test_create_personnel_already_exist()
    {
        $this->actingAs($this->user);

        $personnel = Personnel::factory()->create();
        $personnelData = [
            'nom' => 'test',
            'prenom' => 'Fatima',
            'nom_arab' => 'العمراني',
            'prenom_arab' => 'فاطمة',
            'cin' => 'AB123456',
            'date_naissance' => '1990-03-25',
            'telephone' => '0654321098',
            'email' => $personnel->email,
            'address' => 'Rue Mohamed V, Casablanca',
            'images' => 'image.jpg',
            'matricule' => '654321',
            'ville_id' => 1, 
            'fonction_id' => 1,
            'ETPAffectation_id' => 1,
            'specialite_id' => 1,
            'etablissement_id' => 1, 
            'avancement_id' => 1 
        ];

        try {
            $personnel = $this->personnelRepository->create($personnelData);
            $this->fail('Expected personnelException was not thrown');
        } catch (PersonnelAlreadyExistException $e) {
            $this->assertEquals(__('Le personnel existe déjà'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }


    public function test_update_data()
    {
        $this->actingAs($this->user);
        $personnel = Personnel::factory()->create();
        $personnelData = [
            'nom' => 'El Amrani',
            'prenom' => 'Rachid',
            'nom_arab' => 'العمراني',
            'prenom_arab' => 'فاطمة',
            'cin' => 'AB123456',
            'date_naissance' => '1990-03-25',
            'telephone' => '0654321098',
            'email' => 'fatima.elamrani@example.com',
            'address' => 'Rue Mohamed V, Casablanca',
            'images' => 'image.jpg',
            'matricule' => '654321',
            'ville_id' => 1, 
            'fonction_id' => 1,
            'ETPAffectation_id' => 1,
            'specialite_id' => 1,
            'etablissement_id' => 1, 
            'avancement_id' => 1 
        ];
        $this->personnelRepository->update($personnel->id, $personnelData);
        $this->assertDatabaseHas('users', $personnelData);
    }


    public function test_delete_personnel()
    {
        $this->actingAs($this->user);
        $personnel = Personnel::factory()->create();
        $this->personnelRepository->destroy($personnel->id);
        $this->assertDatabaseMissing('users', ['id' => $personnel->id]);
    }


    public function test_personnel_search()
    {
        $this->actingAs($this->user);
        $personnelData = [
            'nom' => 'test',
            'prenom' => 'Fatima',
            'nom_arab' => 'العمراني',
            'prenom_arab' => 'فاطمة',
            'cin' => 'AB123456',
            'date_naissance' => '1990-03-25',
            'telephone' => '0654321098',
            'email' => 'fatima.elamrani@example.com',
            'address' => 'Rue Mohamed V, Casablanca',
            'images' => 'image.jpg',
            'matricule' => '654321',
            'ville_id' => 1, 
            'fonction_id' => 1,
            'ETPAffectation_id' => 1,
            'specialite_id' => 1,
            'etablissement_id' => 1, 
            'avancement_id' => 1 
        ];
        $this->personnelRepository->create($personnelData);
        $searchValue = 'test';
        $searchResults = $this->personnelRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

}