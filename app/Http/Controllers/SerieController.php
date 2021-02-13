<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    private $Serie;

    public function __construct(Serie $Serie) {
        $this->Serie = $Serie;
    }

    public function index() {
        try {
            $series = $this->Serie->select('cod_serie', 'serie')->get();

            if ($this->objetoVazio($series)) {
                $msg = 'Não encontramos nenhuma serie cadastrada.';
                return $this->RespAlert($msg);
            }

            $msg = 'Series disponiveis buscadas com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'series' => $series));
        } catch (\Exception $e) {
            $msg = 'Encontramos um erro ao tentar buscar as series. Iremos analizar.';
            return $this->RespError($msg, $e);
        }
    }
}
