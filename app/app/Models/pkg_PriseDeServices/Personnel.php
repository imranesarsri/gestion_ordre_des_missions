<?php

namespace App\Models\pkg_PriseDeServices;

use App\Models\pkg_Conges\Conge;
use App\Models\pkg_Absences\Absence;
use App\Models\Pkg_Parametres\{
    Fonction,
    Ville,
    Avancement,
    Etablissement,
    Specialite
};
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends User
{
    use HasFactory;
    protected $table = 'users';

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
        'grade_id',
        'specialite_id',
        'etablissement_id',
        'avancement_id',
    ];
    public function ville(){
        return $this->belongsTo(Ville::class,'ville_id'); 
    }
    public function fonction(){
        return $this->belongsTo(Fonction::class,'fonction_id'); 
    }
    public function specialite(){
        return $this->belongsTo(Specialite::class,'specialite_id'); 
    }
    public function etablissement(){
        return $this->belongsTo(Etablissement::class,'etablissement_id'); 
    }
    public function avancement(){
        return $this->belongsTo(Avancement::class,'avancement_id');
    }
    public function absences()
    {
        return $this->belongsToMany(Absence::class);
    }
    public function conges()
    {
        return $this->belongsToMany(Conge::class, 'personnels_conges', 'personnel_id', 'conges_id')->withTimestamps();
    }
}