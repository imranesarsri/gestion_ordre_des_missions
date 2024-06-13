<?php

namespace Tests\Feature\pkg_Absences;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\pkg_Absences\Absence;
use App\Models\pkg_Parametres\Motif;
use App\Repositories\pkg_Absences\AbsenceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AbenceTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Le référentiel de absences utilisé pour les tests.
     *
     * @var AbsenceRepository
     */
    protected $absenceRepository;

    /**
     * L'utilisateur utilisé pour les tests.
     *
     * @var User
     */
    protected $user;
    protected $motif;

    /**
     * Met en place les préconditions pour chaque test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->absenceRepository = new AbsenceRepository();
        $this->user = User::factory()->create();
        $this->motif = Motif::factory()->create();
    }

    public function test_paginate()
    {
        $absence = [
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-03',
            'remarques' => 'malade',
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
        ];
        $this->absenceRepository->create($absence);
        $this->assertDatabaseHas('absences', $absence);
        $absences = $this->absenceRepository->paginate();
        $this->assertNotNull($absences);
    }

    /**
     * Teste la création d'un absence.
     */
    public function test_create()
    {
        $data = [
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-03',
            'remarques' => 'malade test',
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
        ];
        $absence = $this->absenceRepository->create($data);
        $this->assertEquals($data['remarques'], $absence->remarques);
        $this->assertDatabaseHas('absences', $data);
    }

    /**
     * Teste la mise à jour d'un absence.
     */
    public function test_update()
    {
        $absence = Absence::factory()->create();
        $data = [
            'date_debut' => '2024-05-02',
            'date_fin' => '2024-05-03',
            'remarques' => 'malade Updated',
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
        ];
        $this->absenceRepository->update($absence->id, $data);
        $this->assertDatabaseHas('absences', $data);
    }

    /**
     * Teste la suppression d'un absence.
     */
    public function test_delete_project()
    {
        $project = Absence::factory()->create();
        $this->absenceRepository->destroy($project->id);
        $this->assertDatabaseMissing('absences', ['id' => $project->id]);
    }

    public function test_filter_by_motif()
    {
        $absence1 = Absence::factory()->create([
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
        ]);

        $this->assertDatabaseHas('absences', [
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
        ]);

        $filteredAbsences = $this->absenceRepository->filterByMotif($this->motif->nom);

        $this->assertTrue($filteredAbsences->contains($absence1));
    }

    public function test_filter_by_date_range()
    {
        $startDate = '2024-01-01';
        $endDate = '2024-01-15';
        $absence1 = Absence::factory()->create([
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
            'date_debut' => $startDate,
            'date_fin' => $endDate,
        ]);

        $startDate2 = '2024-01-10';
        $endDate2 = '2024-01-20';
        $absence2 = Absence::factory()->create([
            'user_id' => $this->user->id,
            'motif_id' => $this->motif->id,
            'date_debut' => $startDate2,
            'date_fin' => $endDate2,
        ]);

        // Filter absences by the date range
        $filteredAbsences = $this->absenceRepository->filterByDateRange($startDate, $endDate);

        $this->assertTrue($filteredAbsences->contains($absence1));
        $this->assertTrue($filteredAbsences->contains($absence2));

        // Check if date_debut or date_fin is within the range
        foreach ($filteredAbsences as $absence) {
            $this->assertTrue(
                Carbon::parse($absence->date_debut)->between($startDate, $endDate) ||
                Carbon::parse($absence->date_fin)->between($startDate, $endDate)
            );
        }
    }
}
