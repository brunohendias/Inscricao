<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.turma';
    protected $primaryKey = 'cod_turma';
    public $incrementing = true;
}