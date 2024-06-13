<?php

namespace App\Http\Controllers\Pkg_OrderDesMissions;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AppBaseController;
use App\Models\pkg_OrderDesMissions\Mission;
use App\Models\pkg_OrderDesMissions\Transports;
use App\Exports\pkg_OrderDesMissions\MissionExport;
use App\Imports\pkg_OrderDesMissions\MissionImport;
use App\Repositories\Pkg_OrderDesMissions\MissionsRepositories;
use App\Repositories\Pkg_OrderDesMissions\TransportsRepositories;
use App\Repositories\Pkg_OrderDesMissions\MoyensTransportRepositories;


class MissionsController extends AppBaseController
{
    protected $MissionsRepository;
    protected $MoyensTransportRepositories;
    protected $TransportsRepositories;
    protected $Users;
    public function __construct(MissionsRepositories $missionsRepository, MoyensTransportRepositories $moyensTransportRepositories, TransportsRepositories $transportsRepositories, User $user)
    {
        $this->MissionsRepository = $missionsRepository;
        $this->MoyensTransportRepositories = $moyensTransportRepositories;
        $this->TransportsRepositories = $transportsRepositories;
        $this->Users = $user;
    }

    public function index(Request $request)
    {
        // searchAndFilter
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '' && $searchValue !== 'undefined') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $missions = $this->MissionsRepository->search($searchQuery);
                return view('pkg_OrderDesMissions.index', compact('missions'))->render();
            }
        }
        $missions = $this->MissionsRepository->paginate();
        return view('pkg_OrderDesMissions.index', compact('missions'));

    }

    // filter By Type Mission
    public function filterByTypeMission(Request $request)
    {
        $missionType = $request->input('mission'); // Correct parameter name
        $missions = $this->MissionsRepository->filterByTypeMission($missionType);

        return view('pkg_OrderDesMissions.index', compact('missions'));
    }



    public function show(Request $request, User $mission)
    {
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '' && $searchValue !== 'undefined') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $missions = $this->MissionsRepository->search($searchQuery);
                return view('pkg_OrderDesMissions.show', compact('mission', 'missions'))->render();
            }
        }
        $missions = $mission->missions()->paginate(5);
        return view('pkg_OrderDesMissions.show', compact('mission', 'missions'));
    }


    public function moreDetails(Mission $mission)
    {
        // Eager load the related data
        $mission->load(['users', 'moyensTransport']);
        //
        // $transports = Transports::where('mission_id', $mission->id)->get();
        $transports = $this->TransportsRepositories->getTransportByMissionId($mission->id);
        // Now you can access the transports data
        return view('pkg_OrderDesMissions.moreDetails', compact('mission', 'transports'));
    }

    public function certificate(Mission $mission, User $user)
    {
        $presentDate = Carbon::now()->toDateString();
        $transports = $this->TransportsRepositories->getTransportByMissionId($mission->id)->where('user', $user->id);
        // dd($transports);
        return view('pkg_OrderDesMissions.attestation', compact('mission', 'user', 'presentDate', 'transports'));
    }



    public function create()
    {
        return view('pkg_OrderDesMissions.create');
    }

    /**
     * Renvoie les champs de recherche disponibles.
     * methode store in this path app/Livewire/MultiStepFomr.php
     * used package Livewire
     */

    public function edit(string $id)
    {
        return view('pkg_OrderDesMissions.update', compact('id'));
    }

    /**
     * Renvoie les champs de recherche disponibles.
     * methode update in this path app/Livewire/MultiStepFomr.php
     * used package Livewire
     */

    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->back()->with('success', __('messages.delete_success'));
    }

    // EXPORT
    public function export(Request $request)
    {
        $presentDate = Carbon::now()->toDateString();
        $missions = Mission::with(['users', 'moyensTransport']);

        if (empty($request->all())) {
            return redirect()->back()->with('warning', 'Veuillez sélectionner au moins une option.');
        }

        $missionActuel = $request->has('mission_actuel');
        $missionPrecedente = $request->has('mission_precedente');
        $prochainesMissions = $request->has('prochaines_missions');

        // Check if exactly three parameters are passed in the request
        if (count($request->all()) == 3) {
            $allMissions = $missions->get(); // Use get() to execute the query and retrieve the results
            // dd($allMissions);
        }

        // Check if exactly two parameters are passed in the request
        if (count($request->all()) == 2) {
            if ($missionActuel && $missionPrecedente) {
                $allMissions = $missions->where('date_depart', '<=', $presentDate)->get();
            } elseif ($missionActuel && $prochainesMissions) {
                $allMissions = $missions->where('date_return', '>=', $presentDate)->get();
            } elseif ($missionPrecedente && $prochainesMissions) {
                $allMissions = $missions->where(function ($query) use ($presentDate) {
                    $query->where('date_depart', '<', $presentDate)
                        ->where('date_return', '<=', $presentDate);
                })->orWhere('date_depart', '>=', $presentDate)
                    ->get(); // Use get() to execute the query and retrieve the results
            }
        }

        // Check if only one parameter is passed in the request
        if (count($request->all()) == 1) {
            if ($missionActuel) {
                $allMissions = $missions->where('date_depart', '<=', $presentDate)
                    ->where('date_return', '>=', $presentDate)
                    ->get();
            } elseif ($missionPrecedente) {
                $allMissions = $missions->where('date_return', '<', $presentDate)
                    ->get();
            } elseif ($prochainesMissions) {
                $allMissions = $missions->where('date_depart', '>', $presentDate)
                    ->get();
            }
        }

        if ($allMissions->isEmpty()) {
            return redirect()->back()->with('warning', "Aucune missions n'a été trouvée appartenant à cette catégorie");
        }

        return Excel::download(new MissionExport($allMissions), 'missions_export.xlsx');

    }

    // IMPORT
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new MissionImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('missions.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('missions.index')->with('success', 'chdidid' . ' ' . __('app.addSucées'));
    }

}