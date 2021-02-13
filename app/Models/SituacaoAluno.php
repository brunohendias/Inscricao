<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacaoAluno extends Model
{
    protected $connection = 'mysql';
    protected $table = 'situacao_aluno';
    protected $primaryKey = 'cod_situacao';
    public $incrementing = true;
}