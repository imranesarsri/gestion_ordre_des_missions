<?php

namespace App\Exceptions\Autorisation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerAlreadyExistException extends Exception
{
    public static function ControllerAlreadyExist()
    {
        return new self(__('Autorisation/controllers/message.nomControllerExistDeja'));
    }
    

}
