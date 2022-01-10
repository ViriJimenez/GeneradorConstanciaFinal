<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function ponentes(){
        return $this->belongsToMany(Ponente::class);
    }

    // public function departamento(){
    //     return $this->belongsTo(Categoria::class);
    // }
    // public function conferencias(){
    //     return $this->hasMany('App\Models\Conferencia');
    // }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }
}
