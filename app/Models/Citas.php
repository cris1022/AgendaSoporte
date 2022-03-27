<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $table="citas";

    protected $fillable=[

        'id_tecnico','id_cliente','FyHinicio','FyHfinal'
    ];

    public $timestamps=false;

    public function PAC()
    {

        return $this->belongsTo(Clientes::class, 'id_cliente');
    }

}