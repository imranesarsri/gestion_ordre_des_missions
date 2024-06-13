<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters)
    {
        $controller = class_basename(get_class($this));
        $action = $method;
        if ($controller === 'GestionControllersController') {
            $changeName = preg_replace('/Controller$/', '', $controller);
        } else {
            $changeName = str_replace(['Controller', '@'], ['', '-'], $controller);
        }
        $permissions = $action . '-' . $changeName . 'Controller';
        // dd($permissions);
        $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }
}
