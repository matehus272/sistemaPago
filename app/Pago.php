<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
   protected $table='pago';
    protected $primarykey='id';

    public $timestamps=true;

    protected $fillable =[
    'idtiempo',
    'idparticipante',
    'monto',
    ];
 
    protected $guarded=[

    ];
}
