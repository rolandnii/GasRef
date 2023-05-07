<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    public function dashboard(): View
    {
        if (Auth::user()->user_type == 'admin') {
            return view('admin');
        }
        return view('customer');
    }

    public function placeOrder(): View
    {

        //    dd( date('Y') . date('m') . '0000'  );
        return view('modules.order.index');
    }

    public function confirmOrder(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'delivery_date' =>'required|date',
                'cylinder_size' => 'required|numeric',
            ],
            [
                "delivery_date.required" => "Set your delivery date"
            ]
        );
        if ($validator->fails()) {
            Log::error(join(', ',$validator->errors()->all()));
            return back()->withErrors($validator)->withInput();
        }
        
        return view('modules.order.confirm');
    }
}
