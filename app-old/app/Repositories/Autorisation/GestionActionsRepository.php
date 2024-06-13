<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Action ;
use App\Models\Autorisation\Controller ;
use App\Repositories\BaseRepositorie;
use App\Exceptions\Autorisation\ActionException;

class GestionActionsRepository extends BaseRepositorie {
    protected $model;

    public function __construct(Action $Action){
        $this->model = $Action;
    }
    public function find($id){
        return $this->model->with('controller')->find($id);
    }

    public function searchData($searchableData, $id)
    {
        return $this->model->where(function ($query) use ($searchableData, $id) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->where('controller_id', $id)->paginate(4);
    }

    public function search($searchableData)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%');
        })->paginate(4);
    }


    public function create($data)
    {
        $existingAction = $this->model->where('nom', $data['nom'])
                                     ->where('controller_id', $data['controller_id'])
                                     ->first();

        if ($existingAction) {
            throw new ActionException('Autorisation/action/message.createActionException');
        }
        return $this->model->create($data);
    }

    public function filter()
    {
       return Controller::all();
    }





}
