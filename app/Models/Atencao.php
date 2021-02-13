<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencao extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.atencao';
    protected $primaryKey = 'cod_atencao';
    public $incrementing = true;
}