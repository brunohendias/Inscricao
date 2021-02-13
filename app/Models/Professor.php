<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'professor';
    protected $primaryKey = 'cod_professor';
    public $incrementing = true;
}