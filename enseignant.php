<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
    protected $table = 'enseignants';
    protected $fillable = ['nomenseignant', 'prenomenseignant', 'datenaissanceenseignant', 'sexe', 'matiere_id'];

    public function matiere(){
    	return $this->belongTo('App\matiere');
    }
}
