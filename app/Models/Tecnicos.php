<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    use HasFactory;

    protected $table="users";

    protected $fillable=[

        'name','email','password','documento','telefono','direccion','tarjeta_profesional','id_servicio','rol',






    ];

    public $timestamp=false;

    public function SER(){

        return $this->belongsTo(Servicios::class,'id_servicio');
    }

}
