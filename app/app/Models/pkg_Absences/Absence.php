<?php

namespace App\Models\pkg_Absences;


use App\Models\User;
use App\Models\pkg_Parametres\Motif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'remarques',
        'user_id',
        'motif_id'
    ];

    public function personnel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function motif()
    {
        return $this->belongsTo(Motif::class, 'motif_id');
    }
}
