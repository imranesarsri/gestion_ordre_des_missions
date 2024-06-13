<?php

namespace App\Models\GestionParametres;

use App\Models\GestionConges\Conge;
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

}
