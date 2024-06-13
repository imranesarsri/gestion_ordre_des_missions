<?php

namespace App\Repositories\Pkg_OrderDesMissions;

use Carbon\Carbon;
use App\Repositories\BaseRepository;
use App\Models\pkg_OrderDesMissions\Mission;
use App\Models\pkg_Parametres\Etablissement;
use App\Models\pkg_OrderDesMissions\MoyensTransport;
use App\Exceptions\Pkg_OrderDesMissions\MissionAlreadyExistException;

class MoyensTransportRepositories extends BaseRepository
{
    protected $paginationLimit = 5;
    protected $fieldsSearchable = [
        'nom',
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

    /**
     * Constructeur de la classe TechnologieRepository.
     */
    public function __construct()
    {
        parent::__construct(new MoyensTransport());
    }


    
    public function getMoyensTransport(){
        return $this->model->all();
    }

    public function getMoyensTransportById($id){
        return $this->model->find($id);
    }

    public function getMoyensTransportByName($name){
        return $this->model->where('nom', $name)->first();
    }

}