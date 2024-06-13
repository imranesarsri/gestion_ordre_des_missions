<?php

namespace App\Exceptions\Autorisation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerNotExistException extends Exception
{
    public static function ControllerNotExist()
    {
        return new self(__('Autorisation/controllers/message.controllerExistPas'));
    }


}
