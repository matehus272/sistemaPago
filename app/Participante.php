<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table='participante';
    protected $primarykey='id';

    public $timestamps=false;

    protected $fillable =[
    'nombre',
    'monto_total',
    'estado',
    ];
 
    protected $guarded=[

    ];
}
