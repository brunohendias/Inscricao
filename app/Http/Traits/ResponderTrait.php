<?php
namespace App\Http\Traits;

//use Illuminate\Support\Facades\Log;

trait ResponderTrait {

    public function RespSuccess($msg, $dados) {
        //Log::info($msg,$this->verificaEloquent($dados));
        return responder()->success($dados);
    }

	public function RespAlert($msg, $erro = 400) {
		//Log::alert($msg,$dados);
		return responder()->error($erro, $msg);
	}

    public function RespError($msg, $e, $code = 500) {
        //Log::alert($msg,json_decode($dados,true));
        return responder()->error($code, $msg.$e->getMessage());
    }
}