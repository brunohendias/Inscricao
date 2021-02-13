<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $connection = 'mysql';
    protected $table = 'turma';
    protected $primaryKey = 'cod_turma';
    public $incrementing = true;
}