<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Traits\ResponderTrait;
use App\Http\Traits\UtilTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, 
        DispatchesJobs, 
        ValidatesRequests, 
        ResponderTrait, 
        UtilTrait;
}
