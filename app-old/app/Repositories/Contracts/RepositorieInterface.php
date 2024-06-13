<?php

namespace App\Repositories\Contracts;


interface RepositorieInterface {

    public function paginate($pages = 6);

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);
    
    public function destroy($id);

}