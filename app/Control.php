<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table='control';
    protected $primarykey='id';

    public $timestamps=false;

    protected $fillable =[
    'mes',
    'inicio',
    'fin',
    ];
 
    protected $guarded=[

    ];

}
