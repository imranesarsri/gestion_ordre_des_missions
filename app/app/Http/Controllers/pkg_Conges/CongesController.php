<?php

namespace App\Http\Controllers\pkg_Conges;

use App\Exceptions\pkg_Conges\CongeAlreadyExistException;
use App\Exports\pkg_Conges\CongeExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_Conges\CreateCongeRequest;
use App\Http\Requests\pkg_Conges\UpdateCongeRequest;
use App\Models\pkg_Parametres\Motif;
use App\Repositories\pkg_Conges\CongesRepository;
use App\Repositories\pkg_PriseDeServices\Personnel\PersonnelRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CongesController extends Controller
{
    protected $congesRepository;
    protected $personnels;

    // Constructor to initialize repositories
    public function __construct(CongesRepository $congesRepository, PersonnelRepository $personnelRepository)
    {
        $this->congesRepository = $congesRepository;
        $this->personnels = $personnelRepository;
    }

    // Index method to display the list of congés
    public function index(Request $request)
    {
        // Handle AJAX requests for searching and filtering
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            $startDate = $request->get('startDate');
            $endDate = $request->get('endDate');

            // Fetch filtered or searched data
            $conges = $this->congesRepository->searchData($searchValue, $startDate, $endDate);

            // Return the filtered data view
            return view('pkg_Conges.conges.index', compact('conges'))->render();
        }

        // Fetch paginated data for initial page load
        $conges = $this->congesRepository->paginate($perPage = 6);
        return view('pkg_Conges.conges.index', compact('conges'));
    }

    // Method to show the decision page for a specific personnel
    public function decision($id)
    {
        $personnel = $this->personnels->find($id);
        $currentDate = now()->format('d/m/Y');
        return view('pkg_Conges.conges.decision', compact('personnel', 'currentDate'));
    }

    // Method to show the create conge form
    public function create(Request $request)
    {
        // First year
        $firstYear = now()->format('Y');
        // Last year
        $lastYear = now()->subYear()->format('Y');
        // Two years ago
        $twoYearsAgo = now()->subYears(2)->format('Y');
        // dd($firstYear);
        $personnels = $this->personnels->all();
        // motif
        $motifs = Motif::all();
        $nombreJoursCongesFirstYear = 0;
        $nombreJoursCongesLastYear = 0;
        $nombreJoursCongestwoYearsAgo = 0;

        if ($request->ajax()) {
            $personnel_id = $request->personnel_id;
            $CongesFirstYear = $this->congesRepository->filterByDate(null, null, $firstYear, $personnel_id);
            $CongesLastYear = $this->congesRepository->filterByDate(null, null, $lastYear, $personnel_id);

            foreach ($CongesFirstYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesFirstYear += $conge->nombre_jours;
            }

            foreach ($CongesLastYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesLastYear += $conge->nombre_jours;
            }

            // Calculate sum of jours_restants
            $joursRestantsLastYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesLastYear);
            $joursRestantsFirstYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesFirstYear, $joursRestantsLastYear);


            return view('pkg_Conges.conges.details-calcule', compact('personnels', 'motifs', 'CongesLastYear', 'CongesFirstYear', 'firstYear', 'lastYear', 'joursRestantsLastYear', 'joursRestantsFirstYear'))->render();
        } else {
            $personnel_id = $personnels->first()->id;
            $CongesFirstYear = $this->congesRepository->filterByDate(null, null, $firstYear, $personnel_id);
            $CongesLastYear = $this->congesRepository->filterByDate(null, null, $lastYear, $personnel_id);

            foreach ($CongesFirstYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesFirstYear += $conge->nombre_jours;
            }

            foreach ($CongesLastYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesLastYear += $conge->nombre_jours;
            }

            // Calculate sum of jours_restants
            $joursRestantsLastYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesLastYear);
            $joursRestantsFirstYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesFirstYear, $joursRestantsLastYear);

            return view('pkg_Conges.conges.create', compact('personnels', 'motifs', 'CongesFirstYear', 'CongesLastYear', 'firstYear', 'lastYear', 'joursRestantsLastYear', 'joursRestantsFirstYear'));
        }
    }



    // Method to store a new conge
    public function store(CreateCongeRequest $createCongeRequest)
    {
        $validatedData = $createCongeRequest->validated();
        try {
            // Attempt to create a new conge
            $conge = $this->congesRepository->create($validatedData);
            return to_route('conges.index')->with('success', 'Congés ajouté avec succès');
        } catch (CongeAlreadyExistException $e) {
            // Handle conge already exists exception
            return back()->withInput()->withErrors(['conge_exists' => __('Les congés existent déjà')]);
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return back()->withInput()->withErrors(['unexpected_error' => __('Une erreur inattendue s\'est produite. Veuillez réessayer plus tard.')]);
        }
    }

    // Method to show a specific conge details
    public function show(Request $request, string $id)
    {
        // Handle AJAX requests for searching and filtering
        if ($request->has('searchValue')) {
            $searchValue = $request->get('searchValue');
            $personnel_id = $id;

            // Fetch filtered or searched data
            $personnel = $this->personnels->find($id);
            $conges = $this->congesRepository->getCongesByPersonnelId($searchValue, $personnel_id);

            // Return the filtered data view
            return view('pkg_Conges.conges.show', compact('personnel', 'conges'))->render();
        }

        // Fetch personnel and related conges data
        $personnel = $this->personnels->find($id);
        $conges = $personnel->conges()->paginate(4);

        // Return the view with personnel and conges data
        return view('pkg_Conges.conges.show', compact('personnel', 'conges'));
    }




    // Method to show the edit conge form
    public function edit(Request $request, int $id)
    {
        // First year
        $firstYear = now()->format('Y');
        // Last year
        $lastYear = now()->subYear()->format('Y');
        $conge = $this->congesRepository->find($id);
        $personnels = $this->personnels->all();
        $motifs = Motif::all();
        $nombreJoursCongesFirstYear = 0;
        $nombreJoursCongesLastYear = 0;
        $nombreJoursCongestwoYearsAgo = 0;

        if ($request->ajax()) {
            $personnel_id = $request->personnel_id;
            $CongesFirstYear = $this->congesRepository->filterByDate(null, null, $firstYear, $personnel_id);
            $CongesLastYear = $this->congesRepository->filterByDate(null, null, $lastYear, $personnel_id);

            foreach ($CongesFirstYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesFirstYear += $conge->nombre_jours;
            }

            foreach ($CongesLastYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesLastYear += $conge->nombre_jours;
            }

            // Calculate sum of jours_restants
            $joursRestantsLastYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesLastYear);
            $joursRestantsFirstYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesFirstYear, $joursRestantsLastYear);

            return view('pkg_Conges.conges.details-calcule', compact('personnels', 'motifs', 'CongesLastYear', 'CongesFirstYear', 'firstYear', 'lastYear', 'joursRestantsLastYear', 'joursRestantsFirstYear'))->render();
        } else {
            $personnel_id = $id;
            $CongesFirstYear = $this->congesRepository->filterByDate(null, null, $firstYear, $personnel_id);
            $CongesLastYear = $this->congesRepository->filterByDate(null, null, $lastYear, $personnel_id);

            foreach ($CongesFirstYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesFirstYear += $conge->nombre_jours;
            }

            foreach ($CongesLastYear as $conge) {
                $conge->nombre_jours = $this->congesRepository->getNombreJoursAttribute($conge->date_debut, $conge->date_fin);
                $nombreJoursCongesLastYear += $conge->nombre_jours;
            }

            // Calculate sum of jours_restants
            $joursRestantsLastYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesLastYear);
            $joursRestantsFirstYear = $this->congesRepository->calculateJoursRestants($nombreJoursCongesFirstYear, $joursRestantsLastYear);

            return view('pkg_Conges.conges.edit', compact('conge', 'personnels', 'motifs', 'CongesFirstYear', 'CongesLastYear', 'firstYear', 'lastYear', 'joursRestantsLastYear', 'joursRestantsFirstYear'));
        }
    }

    // Method to update an existing conge
    public function update(UpdateCongeRequest $updateCongeRequest, string $id)
    {
        $validatedData = $updateCongeRequest->validated();
        $conge = $this->congesRepository->update($id, $validatedData);
        return to_route('conges.show', ['conge' => $id])->with('success', 'Congés mis à jour avec succès');
    }

    // Method to delete a conge
    public function destroy(Request $request, $id)
    {
        $inpUserId = $request->inpUserId;
        $this->congesRepository->destroy($id);
        return to_route('conges.show', ['conge' => $inpUserId])->with('success', 'Congés supprimé avec succès');
    }

    // Method to export conges data to an Excel file
    public function export(Request $request)
    {
        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');
        $conges = $this->congesRepository->filterByDate($date_debut, $date_fin);
        return Excel::download(new CongeExport($conges), 'conges_export.xlsx');
    }
}
