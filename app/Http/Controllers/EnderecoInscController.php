<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnderecoInsc;

class EnderecoInscController extends Controller
{
    private $EnderecoInsc;

    public function __construct(EnderecoInsc $EnderecoInsc) {
        $this->EnderecoInsc = $EnderecoInsc;
    }

    public function index($cod_insc) {
        try {

            $endereco = $this->EnderecoInsc->where('cod_insc', $cod_insc)->first();

            if ($this->objetoVazio($endereco)) {
                $msg = 'Não encontramos o endereço desse estudante.';
                return $this->RespAlert($msg);
            }

            $msg = 'Sucesso ao buscar o endereço desse estudante.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'endereco' => $endereco));
        } catch (\Exception $e) {
            $msg = 'Encontramos um erro ao tentar buscar o endereco desse estudante. Iremos analizar.';
            return $this->RespError($msg, $e);
        }
    }

    public function store(Request $request) {
        try {

            $this->EnderecoInsc->cod_insc = $request->cod_insc;
            $this->EnderecoInsc->estado = $request->estado;
            $this->EnderecoInsc->cidade = $request->cidade;
            $this->EnderecoInsc->bairro = $request->bairro;
            $this->EnderecoInsc->rua = $request->rua;
            $this->EnderecoInsc->numero = $request->numero;
            $this->EnderecoInsc->cep = $request->cep;
            $this->EnderecoInsc->save();

            $msg = 'Sucesso ao cadastrar o endereço desse estudante.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'endereco' => $this->EnderecoInsc));
        } catch (\Exception $e) {
            $msg = 'Encontramos um erro ao tentar cadastrar o endereco desse estudante. Iremos analizar.';
            return $this->RespError($msg, $e);
        }
    }
}