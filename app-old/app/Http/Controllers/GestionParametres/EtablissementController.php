<?php

namespace App\Http\Controllers\GestionParametres;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AppBaseController;
use App\Exports\GestionParametres\EtablissementExport;
use App\Imports\GestionParametres\EtablissementImport;
use App\Repositories\GestionParametres\EtablissementRepository;
use App\Exceptions\GestionParametres\EtablissementAlreadyExistException;

class EtablissementController extends AppBaseController
{
    protected $etablissementRepository;

    public function __construct(EtablissementRepository $etablissementRepository)
    {
        $this->etablissementRepository = $etablissementRepository;
    }
    public function index()
    {
        $etablissements = $this->etablissementRepository->paginate();

        return view('GestionParametres.Etablissement.index', compact('etablissements'));
    }

    public function create()
    {
        return view("GestionParametres.Etablissement.create");
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:200',
            'description' => 'string|max:255',
        ]);

        try {
            $this->etablissementRepository->create($validatedData);
            return redirect()->route('etablissement.index')->with('success', __('GestionParametres/Etablissement/message.etablissementAddedSuccessfully'));
        } catch (EtablissementAlreadyExistException $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $etablissement = $this->etablissementRepository->find($id);
        return view('GestionParametres.Etablissement.edit', compact('etablissement'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:200',
            'description' => 'string|max:255',
        ]);
        $this->etablissementRepository->update($id, $validatedData);
        return redirect()->route('etablissement.index', $id)->with('success', __('GestionParametres/Etablissement/message.etablissementUpdatedSuccessfully'));
    }

    public function destroy(string $id)
    {
        $etablissement = $this->etablissementRepository->find($id);

        if (!$etablissement) {
            return redirect()->route('etablissement.index')->with('error', __('GestionParametres/Etablissement/message.etablissementErrorInDelete'));
        }

        try {
            $this->etablissementRepository->destroy($id);
            return redirect()->route('etablissement.index')->with('success', __('GestionParametres/Etablissement/message.etablissementDeletedSuccessfully'));
        } catch (\Exception $e) {
            return redirect()->route('etablissement.index')->with('error', __('GestionParametres/Etablissement/message.etablissementFailedToDeleted'));
        }
    }


    public function export()
    {
        $etablissements = $this->etablissementRepository->getAll();

        return Excel::download(new EtablissementExport($etablissements), 'etablissements.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new EtablissementImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('etablissement.index')->with('error', __('GestionParametres/Etablissement/message.etablissementInvalidArgumentException'));
        } catch (\Exception $e) {
            return redirect()->route('etablissement.index')->with('error', __('GestionParametres/Etablissement/message.etablissementSomethingWrong'));
        } catch (\Error $e) {
            return redirect()->route('etablissement.index')->with('error', __('GestionParametres/Etablissement/message.etablissementSomethingWrong'));
        }
        return redirect()->route('etablissement.index')->with('success', 'Les établissements a ajouté avec succès');
    }



}
