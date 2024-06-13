<?php

namespace App\Models\pkg_Absences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_Absences\JourFerie;


class AnneeJuridique extends Model
{
    use HasFactory;


    protected $fillable = [
        'annee',
        'remarques',
    ];

    public function jourFerie()
    {
        return $this->hasMany(JourFerie::class, 'annee_juridique_id');
    }
}
