<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.disciplina';
    protected $primaryKey = 'cod_disciplina';
    public $incrementing = true;
}