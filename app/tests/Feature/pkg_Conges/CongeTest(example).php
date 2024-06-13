<?php

namespace Tests\Feature\pkg_Conges;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CongesRepository;
use App\Models\pkg_Conges\Conge;

class CongeTest extends TestCase
{
    use RefreshDatabase;

    protected $congesRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->congesRepository = new CongesRepository(new Conge());
    }

    /** @test */
    public function it_can_create_a_conge()
    {
        $data = [
            'user_id' => 1,
            'date_debut' => now()->toDateString(),
            'date_fin' => now()->addDays(5)->toDateString(),
            'motif_id' => 1,
        ];

        $conge = $this->congesRepository->create($data);

        $this->assertDatabaseHas('conges', $data);
        $this->assertInstanceOf(Conge::class, $conge);
    }

    /** @test */
    public function it_can_find_a_conge_by_id()
    {
        $conge = Conge::factory()->create();

        $foundConge = $this->congesRepository->find($conge->id);

        $this->assertInstanceOf(Conge::class, $foundConge);
        $this->assertEquals($foundConge->id, $conge->id);
    }

    /** @test */
    public function it_can_update_a_conge()
    {
        $conge = Conge::factory()->create();

        $updateData = [
            'motif_id' => 2,
        ];

        $updated = $this->congesRepository->update($conge->id, $updateData);

        $this->assertTrue($updated);
        $this->assertDatabaseHas('conges', $updateData);
    }

    /** @test */
    public function it_can_delete_a_conge()
    {
        $conge = Conge::factory()->create();

        $deleted = $this->congesRepository->destroy($conge->id);

        $this->assertTrue($deleted);
        $this->assertDatabaseMissing('conges', ['id' => $conge->id]);
    }

    /** @test */
    public function it_can_paginate_conges()
    {
        Conge::factory()->count(15)->create();

        $paginatedConges = $this->congesRepository->paginate();

        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $paginatedConges);
        $this->assertCount(10, $paginatedConges->items());
    }
}
