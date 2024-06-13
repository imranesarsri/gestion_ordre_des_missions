<?php

namespace App\Http\Requests\pkg_PriseDeServices;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'nom_arab' => 'required|string|max:255',
            'prenom_arab' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'address' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ville_id' => 'required|numeric|max:255',
            'etablissement_id' => 'required|numeric|max:255',
            'ETPAffectation_id' => 'required|numeric',
            'specialite_id' => 'required|numeric|max:255',
            'fonction_id' => 'required|numeric|max:255',
            'matricule' => 'required|numeric',
            'avancement_id' => 'required|numeric'
        ];
    }

}
