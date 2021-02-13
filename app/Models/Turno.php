<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.turno';
    protected $primaryKey = 'cod_turno';
    public $incrementing = true;
}