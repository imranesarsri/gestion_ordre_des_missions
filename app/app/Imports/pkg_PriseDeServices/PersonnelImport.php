<?php

namespace App\Imports\GestionParametres;

use App\Models\pkg_PriseDeServices\Personnel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\GestionParametres\Etablissement;
use App\Repositories\GestionParametres\EtablissementRepository;
use App\Exceptions\GestionParametres\EtablissementAlreadyExistException;

class PersonnelImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            $this->validate($row);
            return new Personnel([
                'nom' => $row["nom"],
                'prenom' => $row["prenom"],
                'nom_arab' => $row["nom_arab"],
                'prenom_arab' => $row["prenom_arab"],
                'cin' => $row["cin"],
                'date_naissance' => $row["date_naissance"],
                'telephone' => $row["telephone"],
                'email' => $row["email"],
                'address' => $row["address"],
                'images' => $row["images"],
                'matricule' => $row["matricule"],
                'ville_id' => $row["ville_id"],
                'fonction_id' => $row["fonction_id"],
                'ETPAffectation_id' => $row["ETPAffectation_id"],
                'grade_id' => $row["grade_id"],
                'specialite_id' => $row["specialite_id"],
                'etablissement_id' => $row["etablissement_id"],
                'avancement_id' => $row["avancement_id"],
            ]);
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('personnels.index')->withError(__('GestionParametres/personnels/message.personnelsInvalidArgumentException'));
        } catch (\Error $e) {
            return redirect()->route('personnels.index')->withError(__('GestionParametres/personnels/message.personnelsSomethingWrong'));
        } catch (\Exception $e) {
            return redirect()->route('personnels.index')->withError(__('GestionParametres/personnels/message.personnelsSomethingWrong'));
        }
    }


    /**
     * Validate the row data.
     *
     * @param array $row
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validate(array $row)
    {
        $validator = Validator::make($row, [
            'nom' => 'required|string|max:200|unique:etablissements',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $errorMessage = 'Les données fournies ne sont pas valides. Veuillez vérifier les erreurs ci-dessous et réessayer.';

            // Store the error message in the session
            session()->flash('error', $errorMessage);

            // throw new \Illuminate\Validation\ValidationException($validator, response()->json(['message' => $errorMessage], 422));
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

}
