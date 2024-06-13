<?php

namespace App\Repositories\GestionParametres;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Repositories\BaseRepositorie;
use App\Models\GestionParametres\Etablissement;
use App\Exceptions\GestionParametres\EtablissementAlreadyExistException;

class EtablissementRepository extends BaseRepositorie
{
    protected $model;

    public function __construct(Etablissement $etablissement)
    {
        $this->model = $etablissement;
    }


    public function create(array $data)
    {
        $nom = $data['nom'];

        try {
            if (Etablissement::where('nom', $nom)->exists()) {
                throw EtablissementAlreadyExistException::EtablissementAlreadyExists();
            }
            return parent::create($data);
        } catch (EtablissementAlreadyExistException $e) {
            throw EtablissementAlreadyExistException::EtablissementAlreadyExists();
        } catch (Exception $e) {
            throw new Exception(__('GestionParametres/Etablissement/message.unexpected_error'));
        }

    }


    public function getAll()
    {
        return $this->model->all();
    }


}
