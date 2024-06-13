<?php

namespace App\Repositories\Pkg_OrderDesMissions;

use Carbon\Carbon;
use App\Repositories\BaseRepository;
use App\Models\pkg_OrderDesMissions\Transports;
use App\Exceptions\Pkg_OrderDesMissions\MissionAlreadyExistException;

class MissionPersonnelRepositories extends BaseRepository
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
        parent::__construct(new Transports());
    }


    // public function getTransportByMissionId($missionId)
    // {
    //     return $this->model->where('mission_id', $missionId)->get();
    // }


}