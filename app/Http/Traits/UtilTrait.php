<?php
namespace App\Http\Traits;

trait UtilTrait {

    public function upperCase($string) {
        return mb_string($string, 'UTF-8');
    }

    public function objetoVazio($objeto) {
        if (!$objeto || is_null($objeto) || $objeto->count() == 0) {
            return true;
        }
        
        return false;
    }
}