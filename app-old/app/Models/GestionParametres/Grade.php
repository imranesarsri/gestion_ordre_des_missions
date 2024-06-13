<?php

namespace App\Models\GestionParametres;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'echell_debut',
        'echell_fin'
    ];

}
