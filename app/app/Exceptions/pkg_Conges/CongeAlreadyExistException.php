<?php

namespace App\Exceptions\pkg_conges;

use Exception;

class CongeAlreadyExistException extends Exception
{
    public static function existConge()
    {
        return new self(__('Les congés existent déjà'));
    }
}
