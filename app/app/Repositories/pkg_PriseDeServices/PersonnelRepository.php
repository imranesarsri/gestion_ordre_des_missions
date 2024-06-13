<?php

namespace App\Repositories\pkg_PriseDeServices;

use App\Models\pkg_PriseDeServices\Personnel;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_PriseDeServices\PersonnelAlreadyExistException;

class PersonnelRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom',
        'prenom',
        'nom_arab',
        'prenom_arab',
        'cin',
        'date_naissance',
        'telephone',
        'email',
        'password',
        'address',
        'images',
        'matricule',
        'ville_id',
        'fonction_id',
        'ETPAffectation_id',
        'grade_id',
        'specialite_id',
        'etablissement_id',
        'avancement_id',
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    public function __construct(Personnel $user)
    {
        $this->model = $user;
    }
    public function create(array $data)
    {
        $email = $data['email'];

        $existingUser = Personnel::where('email', $email)->exists();

        if ($existingUser) {
            throw PersonnelAlreadyExistException::createProject();
        } else {
            return parent::create($data);
        }
    }
     /**
     * Recherche les projets correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('prenom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
    // public function paginate($perPage = 6)
    // {
    //     $query = $this->model->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->where('roles.name', '!=', 'admin')
    //         ->select('users.*');

    //     return $query->paginate($perPage);
    // }
}
