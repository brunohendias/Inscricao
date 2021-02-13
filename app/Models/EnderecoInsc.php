<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inscricao;

class EnderecoInsc extends Model
{
    protected $connection = 'mysql';
    protected $table = 'endereco_insc';
    protected $primaryKey = 'cod_endereco_insc';
    public $incrementing = true;

    public function inscricao() {
        return $this->hasOne(Inscricao::class, 'cod_insc', 'cod_insc');
    }
}
