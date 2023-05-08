<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function store(Request $request, $code)
    {   $user = auth()->user()->user_code;
        $order= DB::table('orders')
        ->where('transid',$code)
        ->where('user_code',$user)
        ->where('user_confirm', 0)
        ->first();
        if(empty($order))
        {
           abort(503);
        }
        DB::table('orders')
        ->where('transid',$code)
        ->update([
            'user_confirm' => 1
        ]);
        return redirect('order/done');

    }
}
