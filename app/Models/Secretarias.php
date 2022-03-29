<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretarias extends Model
{
    use HasFactory;

        protected $table= 'users';

        protected $fillable= [
            'name','email','password','documento','telefono','direccion','tarjeta_profesional','id_servicio','rol',
        ];

        public $timestamps="false";

}
