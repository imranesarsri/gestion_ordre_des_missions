<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters)
    {
        $controller = class_basename(get_class($this)); 
        $action = $method;  
        $changeName = str_replace(['Controller', '@'], ['', '-'], $controller); 
        $permissions = $action . '-' . $changeName; 
        $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }
}