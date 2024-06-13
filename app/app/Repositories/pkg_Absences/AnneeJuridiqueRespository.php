<?php

namespace App\Repositories\pkg_Absences;

use App\Repositories\BaseRepository;
use App\Models\pkg_Absences\AnneeJuridique;
use App\Exceptions\pkg_Absences\AnneeJuridiqueAlreadyExistException;

/**
 * Classe ProjetRepository qui gère la persistance des projets dans la base de données.
 */
class AnneeJuridiqueRespository extends BaseRepository
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
        parent::__construct(new AnneeJuridique());
    }


    /**
     * Crée un nouveau annee Juridique.
     *
     * @param array $data Données du annee Juridique à créer.
     * @return mixed
     * @throws AnneeJuridiqueAlreadyExistException Si le annee Juridique existe déjà.
     */
    public function create(array $data)
    {
        $annee = $data['annee'];

        $existingAnneeJuridique = $this->model->where('annee', $annee)->exists();

        if ($existingAnneeJuridique) {
            throw AnneeJuridiqueAlreadyExistException::create();
        }
        return parent::create($data);
    }


    /**
     * Met à jour un annee Juridique existant.
     *
     * @param int $id Identifiant de l'annee Juridique à mettre à jour.
     * @param array $data Données de l'annee Juridique à mettre à jour.
     * @return mixed
     * @throws AnneeJuridiqueAlreadyExistException Si le annee Juridique existe déjà.
     */
    public function update($id, array $data)
    {
        $annee = $data['annee'];

        $existingAnneeJuridique = $this->model->where('annee', $annee)
            ->where('id', '!=', $id)
            ->exists();

        if ($existingAnneeJuridique) {
            throw AnneeJuridiqueAlreadyExistException::create();
        }

        return parent::update($id, $data);
    }

}
