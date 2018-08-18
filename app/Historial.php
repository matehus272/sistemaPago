<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
     protected $table='historial';
    protected $primarykey='id';

    public $timestamps=true;

    protected $fillable =[
    'idparticipante',
    'idtiempo',
    'estado',
    'monto',
    'fechapagado',
    ];
 
    protected $guarded=[

    ];
}
