<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atencao;

class AtencaoController extends Controller
{
    private $Atencao;

    public function __construct(Atencao $Atencao) {
        $this->Atencao = $Atencao;
    }

    public function index() {
        try {
            $atencoes = $this->Atencao->select('cod_atencao', 'atencao')->get();

            if ($this->objetoVazio($atencoes)) {
                $msg = 'Não encontramos nenhuma atenção cadastrada.';
                return $this->RespAlert($msg);
            }

            $msg = 'Atenções disponiveis buscadas com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'atencoes' => $atencoes));
        } catch (\Exception $e) {
            $msg = 'Encontramos um erro ao tentar buscar as atenções. Iremos analizar.';
            return $this->RespError($msg, $e);
        }
    }
}
