<?php

namespace App\Models\pkg_OrderDesMissions;

use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_OrderDesMissions\Mission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoyensTransport extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'remarque',
    ];

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'transports', 'moyens_transports_id', 'mission_id');
    }
}