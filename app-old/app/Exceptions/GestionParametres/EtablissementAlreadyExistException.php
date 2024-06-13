<?php

namespace App\Exceptions\GestionParametres;

use Exception;

class EtablissementAlreadyExistException extends Exception
{
    public static function EtablissementAlreadyExists()
    {
        return new self(__('GestionParametres/Etablissement/message.etablissementAlreadyExists'));
    }
}
