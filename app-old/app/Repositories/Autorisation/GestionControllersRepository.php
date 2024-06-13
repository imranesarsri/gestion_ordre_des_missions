<?php

namespace App\Repositories\Autorisation;

use App\Exceptions\Autorisation\ControllerNotExistException;
use App\Exceptions\Autorisation\ControllerAlreadyExistException;
use App\Repositories\BaseRepositorie;
use Illuminate\Support\Facades\Route;
use App\Models\Autorisation\Controller as AutorisationController;

class GestionControllersRepository extends BaseRepositorie {
    protected $model;

    public function __construct(AutorisationController $Controller){
        $this->model = $Controller;
    }

    public function getModel() {
        return $this->model;
    }

    public function create(array $data) {
        $nom = $data['nom'];

        if (!in_array($nom, $this->extractControllerNames())) {
            throw new ControllerNotExistException(__('Autorisation/controllers/message.controllerExistPas'));
        }

        $existingController = $this->model->where('nom', $nom)->first();
        if ($existingController) {
            throw new ControllerAlreadyExistException(__('Autorisation/controllers/message.nomControllerExistDeja'));
        }

        return parent::create($data);
    }

    public function update($id, array $data) {
        $nom = $data['nom'];

        if (!in_array($nom, $this->extractControllerNames())) {
            throw new ControllerNotExistException(__('Autorisation/controllers/message.controllerExistPas'));
        }

        $existingController = $this->model->where('nom', $nom)->where('id', '!=', $id)->first();
        if ($existingController) {
            throw new ControllerAlreadyExistException(__('Autorisation/controllers/message.nomControllerExistDeja'));
        }

        return parent::update($id, $data);
    }

    public static function extractControllerNames(): array
    {
        $extractControllerNames = [];
        // Loop through all routes
        foreach (Route::getRoutes() as $route) {
            $action = $route->getAction();
            // Check if the route has a controller key in its action
            if (array_key_exists('controller', $action)) {
                $fullControllerName = $action['controller'];
                // Check if the controller is in the correct namespace and does not belong to Auth namespace
                if (
                    strpos($fullControllerName, 'App\Http\Controllers\\') === 0 &&
                    strpos($fullControllerName, 'App\Http\Controllers\Auth\\') !== 0
                ) {
                    // Extract the controller class name without the namespace and method
                    $controllerNameWithNamespace = str_replace('App\Http\Controllers\\', '', $fullControllerName);
                    $controllerNameParts = explode('\\', $controllerNameWithNamespace);
                    $controllerClassName = end($controllerNameParts); // Get the last part (controller class name)
                    $controllerClassNameWithoutMethod = strtok($controllerClassName, '@');
                    $extractControllerNames[] = $controllerClassNameWithoutMethod;
                }
            }
        }
        // Remove duplicate controller names
        $uniqueControllerNames = array_unique($extractControllerNames);
        return $uniqueControllerNames;
    }

}
