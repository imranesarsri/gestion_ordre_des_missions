<?php

namespace App\Exceptions\pkg_PriseDeServices;

use App\Exceptions\BusinessException;

class PersonnelAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('Le personnel existe déjà'));
    }
}