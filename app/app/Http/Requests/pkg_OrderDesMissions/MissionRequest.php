<?php
namespace App\Http\Requests\pkg_OrderDesMissions;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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
            'numero_mission' => 'required|max:10|unique:missions,numero_mission',
            'nature' => 'nullable|max:40',
            'lieu' => 'required|max:100',
            'type_de_mission' => 'required|max:100',
            'numero_ordre_mission' => 'required|max:10|unique:missions,numero_ordre_mission',
            'data_ordre_mission' => 'required|date',
            'date_debut' => 'required|date', // |before:date_fin
            'date_fin' => 'required|date', // |after:date_debut
            'date_depart' => 'required|date',
            'heure_de_depart' => 'required',
            'date_return' => 'required|date',  //|after:date_depart
            'heure_de_return' => 'required',
            //
            'users' => 'required|array',
            'moyens_transports' => 'required|array',
            // 'transport_utiliser' => 'required',
            'marque' => 'required',
            'puissance_fiscal' => 'required',
            'numiro_plaque' => 'required',


        ];

    }


}