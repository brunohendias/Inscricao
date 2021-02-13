<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.serie';
    protected $primaryKey = 'cod_serie';
    public $incrementing = true;
}