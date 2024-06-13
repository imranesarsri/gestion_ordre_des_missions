<?php

namespace App\Repositories\Autorisation;

use App\Exceptions\Autorisation\RoleException;
use App\Models\Autorisation\Role;
use App\Repositories\BaseRepositorie;

class RoleRepository extends BaseRepositorie
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('name', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }

    public function create(array $data)
    {
        $name = $data['name'];

        // Check if the name exists in the database
        $existingRecord = Role::where('name', $name)->exists();

        if ($existingRecord) {
            throw RoleException::createRole();
        } else {
            return parent::create($data);
        }
    }

    // update
    public function update($id, array $data)
    {
        $name = $data['name'];
        // Check if the name exists in the database
        $existingRecord = Role::where('name', $name)->exists();

        if ($existingRecord) {
            throw RoleException::createRole();
        } else {
            return parent::update($id, $data);
        }
    }
}
