<?php

namespace App\Repositories\GestionParametres;

use App\Exceptions\GestionParametres\MotifAlreadyExistException;
use App\Models\GestionParametres\Motif;
use App\Repositories\BaseRepositorie;

class MotifsRepository extends BaseRepositorie
{
    protected $model;

    public function __construct(Motif $motif)
    {
        $this->model = $motif;
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
            ->where('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function create(array $data)
    {
        $name = $data['nom'];

        // Check if the name exists in the database
        $existingRecord = Motif::where('nom', $name)->exists();

        if ($existingRecord) {
            throw MotifAlreadyExistException::createMotif();
        } else {
            return parent::create($data);
        }
    }

    // update
    public function update($id, array $data)
    {
        $name = $data['nom'];
        // Check if the name exists in the database
        $existingRecord = Motif::where('nom', $name)->exists();

        if ($existingRecord) {
            throw MotifAlreadyExistException::createMotif();
        } else {
            return parent::update($id, $data);
        }
    }
}