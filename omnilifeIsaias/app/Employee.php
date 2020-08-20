<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    
    use SoftDeletes;

    protected $fillable=['id','codigo','nombre','salarioDolores','salarioPesos','direccion','estado','ciudad','telefono','correo','activo'];
}
