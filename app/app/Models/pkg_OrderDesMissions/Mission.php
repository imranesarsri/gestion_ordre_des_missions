<?php

namespace App\Models\pkg_OrderDesMissions;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\pkg_OrderDesMissions\MoyensTransport;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mission',
        'nature',
        'lieu',
        'type_de_mission',
        'numero_ordre_mission',
        'data_ordre_mission',
        'date_debut',
        'date_fin',
        'date_depart',
        'heure_de_depart',
        'date_return',
        'heure_de_return',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'mission_personnels', 'mission_id', 'user_id');
    }

    public function moyensTransport()
    {
        return $this->belongsToMany(MoyensTransport::class, 'transports', 'mission_id', 'moyens_transports_id')->withTimestamps();
    }


    // Accessor to calculate the duration of the mission
    public function getDurationAttribute()
    {
        $dateDebut = Carbon::parse($this->date_debut);
        $dateReturn = Carbon::parse($this->date_return);

        return $dateDebut->diffForHumans($dateReturn, true); // Get a human-readable difference
    }
}