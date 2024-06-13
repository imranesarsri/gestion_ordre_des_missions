<?php

namespace App\Models\pkg_Parametres;

use App\Models\pkg_Absences\Absence;
use App\Models\GestionPersonnels\Personnel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];


    public function Absences()
    {
        return $this->hasMany(Absence::class, 'motif_id');
    }

}
