<?php

namespace App\Repositories\pkg_Absences;

use App\Repositories\BaseRepository;
use App\Models\pkg_Absences\JourFerie;

/**
 * Classe ProjetRepository qui gère la persistance des projets dans la base de données.
 */
class JourFerieRespository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom'
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
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new JourFerie());
    }

}
