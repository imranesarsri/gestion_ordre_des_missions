<?php

namespace App\Models\GestionParametres;

use App\Models\GestionPersonnels\Personnel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description'
    ];

}