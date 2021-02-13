<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\EnderecoInsc;

class Inscricao extends Model
{
    protected $connection = 'mysql';
    protected $table = 'brunoh67_dbgerence.inscricao';
    protected $primaryKey = 'cod_insc';
    public $incrementing = true;

    public function serie() {
        return $this->hasOne(Serie::class, 'cod_serie', 'cod_serie')->select('cod_serie', 'serie');
    }

    public function endereco() {
        return $this->hasOne(EnderecoInsc::class, 'cod_insc', 'cod_insc')
            ->select('cod_endereco_insc', 'cod_insc', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'cep');
    }
}