<?php

namespace Tests\Feature\pkg_Absences;

use Tests\TestCase;
use App\Models\User;
use App\Models\pkg_Parametres\Motif;
use App\Models\pkg_Absences\AnneeJuridique;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_Absences\AnneeJuridiqueRespository;
use App\Exceptions\pkg_Absences\AnneeJuridiqueAlreadyExistException;

class AnneeJuridiqueTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Le référentiel de projets utilisé pour les tests.
     *
     * @var AnneeJuridiqueRespository
     */
    protected $anneeJuridiqueRespository;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
     */
    protected $user;

    /**
     * Met en place les préconditions pour chaque test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->anneeJuridiqueRespository = new AnneeJuridiqueRespository();
        $this->user = User::factory()->create();
    }


    public function test_paginate()
    {
        $anneeJuridique = [
            'annee' => '2090-2091',
            'remarques' => '',
        ];
        $this->anneeJuridiqueRespository->create($anneeJuridique);
        $this->assertDatabaseHas('annee_juridiques', $anneeJuridique);
        $anneeJuridiques = $this->anneeJuridiqueRespository->paginate();
        $this->assertNotNull($anneeJuridiques);
    }


    /**
     * Teste la création d'un annee juridique.
     */
    public function test_create_annee_juridique()
    {
        $data = [
            'annee' => '2090-2002',
            'remarques' => '',
        ];
        $absence = $this->anneeJuridiqueRespository->create($data);
        $this->assertEquals($data['annee'], $absence->annee);
        $this->assertDatabaseHas('annee_juridiques', $data);
    }


    /**
     * Teste la création d'un annee Juridique déjà existant.
     */
    public function test_create_annee_juridique_already_exist()
    {
        $anneeJuridique = AnneeJuridique::factory()->create();
        $data = [
            'annee' => $anneeJuridique->annee,
            'remarques' => 'annee Juridique create test',
        ];

        try {
            $this->anneeJuridiqueRespository->create($data);
            $this->fail('Expected AnneeJuridiqueException was not thrown');
        } catch (AnneeJuridiqueAlreadyExistException $e) {
            $this->assertEquals(__('pkg_Absences/AnneJuridique/message.AnneeJuridiqueAlreadyExist'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }


    /**
     * Teste la mise à jour d'un annee Juridique.
     */
    public function test_update_annee_juridique()
    {
        $anneeJuridique = AnneeJuridique::factory()->create();
        $data = [
            'annee' => '1010-2020',
            'remarques' => 'update AnneeJuridique test',
        ];
        $this->anneeJuridiqueRespository->update($anneeJuridique->id, $data);
        $this->assertDatabaseHas('annee_juridiques', $data);
    }


    /**
     * Teste update d'un annee Juridique déjà existant.
     */
    public function test_update_annee_juridique_to_annee_juridique_already_exist()
    {
        $anneeJuridique = AnneeJuridique::factory()->create();
        $ExistanneeJuridique = AnneeJuridique::first();
        $data = [
            'annee' => $ExistanneeJuridique->annee,
            'remarques' => 'annee Juridique create test',
        ];

        try {
            $this->anneeJuridiqueRespository->update($anneeJuridique->id, $data);
            $this->fail('Expected AnneeJuridiqueException was not thrown');
        } catch (AnneeJuridiqueAlreadyExistException $e) {
            $this->assertEquals(__('pkg_Absences/AnneJuridique/message.AnneeJuridiqueAlreadyExist'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }



    /**
     * Teste la suppression d'un annee Juridique.
     */
    public function test_delete_annee_juridique()
    {
        $anneeJuridique = AnneeJuridique::factory()->create();
        $this->anneeJuridiqueRespository->destroy($anneeJuridique->id);
        $this->assertDatabaseMissing('annee_juridiques', ['id' => $anneeJuridique->id]);
    }



}
