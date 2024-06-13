<?php

namespace App\Imports\GestionParametres;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\GestionParametres\Etablissement;
use App\Repositories\GestionParametres\EtablissementRepository;
use App\Exceptions\GestionParametres\EtablissementAlreadyExistException;

class EtablissementImport implements ToModel, WithHeadingRow
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
            return new Etablissement([
                'nom' => $row["nom"],
                'description' => $row["description"],
            ]);
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('etablissement.index')->withError(__('GestionParametres/Etablissement/message.etablissementInvalidArgumentException'));
        } catch (\Error $e) {
            return redirect()->route('etablissement.index')->withError(__('GestionParametres/Etablissement/message.etablissementSomethingWrong'));
        } catch (\Exception $e) {
            return redirect()->route('etablissement.index')->withError(__('GestionParametres/Etablissement/message.etablissementSomethingWrong'));
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
