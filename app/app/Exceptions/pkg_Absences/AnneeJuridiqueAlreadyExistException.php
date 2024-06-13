<?php

namespace App\Exceptions\pkg_Absences;

use Exception;

class AnneeJuridiqueAlreadyExistException extends Exception
{
    public static function create()
    {
        return new self(__('pkg_Absences/AnneJuridique/message.AnneeJuridiqueAlreadyExist'));
    }
}
