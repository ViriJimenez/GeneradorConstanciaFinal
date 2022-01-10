<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function ponente(){
        return $this->belongsTo('App\Models\Ponente');
    }

    public function docente(){
        return $this->belongsTo('App\Models\Docente');
    }
}
