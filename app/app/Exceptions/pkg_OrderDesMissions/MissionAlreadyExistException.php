<?php

namespace App\Exceptions\Pkg_OrderDesMissions;

use App\Exceptions\BusinessException;

class MissionAlreadyExistException extends BusinessException
{
    public static function createMission()
    {
        return new self(__('Order des missions est déjà existant'));
    }
}