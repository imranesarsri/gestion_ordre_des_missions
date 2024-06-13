<?php

namespace App\Models\pkg_OrderDesMissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transports extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_utiliser',
        'marque',
        'puissance_fiscal',
        'numiro_plaque',
        'user',
        'moyens_transports_id',
        'mission_id',
    ];

}