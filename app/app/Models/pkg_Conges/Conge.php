<?php

namespace App\Models\pkg_Conges;

use App\Models\pkg_Parametres\Motif;
use App\Models\pkg_PriseDeServices\Personnel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'motif_id',
    ];

    public function personnels()
    {
        return $this->belongsToMany(User::class, 'personnels_conges', 'conges_id', 'personnel_id');
    }

    public function motif()
    {
        return $this->belongsTo(Motif::class, 'motif_id');
    }
}
