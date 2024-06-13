<?php

namespace App\Models\pkg_OrderDesMissions;

use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MissionPersonnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mission_id',
    ];
}