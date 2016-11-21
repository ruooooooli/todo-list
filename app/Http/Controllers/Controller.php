<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message, $data = array(), $status = 200)
    {
        return response()->json(array(
            'code'      => 'success',
            'message'   => $message,
            'data'      => $data,
            'status'    => $status,
        ));
    }

    public function error($message, $data = array(), $status = 200)
    {
        return response()->json(array(
            'code'      => 'error',
            'message'   => $message,
            'data'      => $data,
            'status'    => $status,
        ));
    }
}
