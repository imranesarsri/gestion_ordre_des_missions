<?php

namespace App\Exceptions\GestionParametres;

use Exception;

class MotifAlreadyExistException extends Exception
{
    public static function createMotif()
    {
        return new self(__('GestionParametre/motif/message.createMotifException'));
    }
}