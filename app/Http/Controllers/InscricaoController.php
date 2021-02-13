<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;

class InscricaoController extends Controller
{
    private $Inscricao;

    public function __construct(Inscricao $Inscricao) {
        $this->Inscricao = $Inscricao;
    }

    public function index() {
        try {
            return "em construção";
        } catch(\Exception $e) {
            return "em construção";
        }
    }

    public function store(Request $request) {
        try {
            $this->Inscricao->nom_insc = $request->nom_insc;
            $this->Inscricao->data_nasci = $request->data_nasci;
            $this->Inscricao->telefone = $request->telefone;
            $this->Inscricao->email = $request->email;
            $this->Inscricao->cod_serie = $request->cod_serie;
            $this->Inscricao->cod_atencao = $request->cod_atencao;
            $this->Inscricao->cpf = $request->cpf;
            $this->Inscricao->rg = $request->rg;
            $this->Inscricao->nom_mae = $request->nom_mae;
            $this->Inscricao->nom_pai = $request->nom_pai;
            $this->Inscricao->save();

            $msg = 'Sucesso ao se matricular nessa escola. Sejá bem vindo.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'inscricao' => $this->Inscricao));
        } catch (\Exception $e) {
            $msg = 'Encontramos um erro ao tentar matricular você nessa escola. Iremos analizar.';
            return $this->RespError($msg, $e);
        }
    }
}