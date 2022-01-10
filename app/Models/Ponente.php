<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }

    public function conferencias(){
        return $this->hasMany('App\Models\Conferencia');
    }
}
