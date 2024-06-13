<?php

namespace Tests\Feature\pkg_Absences;

use App\Models\pkg_Absences\JourFerie;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\pkg_Absences\JourFerieRespository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JourFerieTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Le référentiel de projets utilisé pour les tests.
     *
     * @var JourFerieRespository
     */
    protected $jourFerieRespository;

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
        $this->jourFerieRespository = new JourFerieRespository();
        $this->user = User::factory()->create();
    }

    public function test_paginate()
    {
        JourFerie::factory()->count(5)->create();
        $jourFeries  = $this->jourFerieRespository->paginate();
        $this->assertNotNull($jourFeries);
    }


}
