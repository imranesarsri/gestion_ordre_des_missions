<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use spatie package
use Spatie\Permission\Traits\HasRoles;
// use parametres
use App\Models\pkg_Parametres\Ville;
use App\Models\pkg_Parametres\Fonction;
use App\Models\pkg_Parametres\Avancement;
use App\Models\pkg_Parametres\Specialite;
use App\Models\pkg_Parametres\Etablissement;
// use models of packages
use App\Models\pkg_OrderDesMissions\Mission;
use App\Models\pkg_Absences\Absence;
use App\Models\pkg_Conges\Conge;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const ADMIN = "admin";
    const RESPONSABLE = "responsable";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'nom_arab',
        'prenom_arab',
        'cin',
        'date_naissance',
        'telephone',
        'email',
        'password',
        'address',
        'images',
        'matricule',
        'ville_id',
        'fonction_id',
        'ETPAffectation_id',
        'grade_id',
        'specialite_id',
        'etablissement_id',
        'avancement_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }
    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }
    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'specialite_id');
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');
    }
    public function etp_Affectation()
    {
        return $this->belongsTo(Etablissement::class, 'ETPAffectation_id');
    }
    public function avancement()
    {
        return $this->belongsTo(Avancement::class, 'avancement_id');
    }
    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id');
    }

    public function conges()
    {
        return $this->belongsToMany(Conge::class, 'personnels_conges', 'user_id', 'conges_id')->withTimestamps();
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'mission_personnels', 'user_id', 'mission_id')->withTimestamps();
    }




    //
    public function getFullNameAttribute()
    {
        return $this->nom . " " . $this->prenom; // Get a human-readable difference
    }

}