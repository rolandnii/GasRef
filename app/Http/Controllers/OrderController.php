<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function store(Request $request, $code): RedirectResponse
    {
        $user = auth()->user()->user_code;
        $order = DB::table('orders')
            ->where('transid', $code)
            ->where('user_code', $user)
            ->where('user_confirm', 0)
            ->first();
        if (empty($order)) {
            abort(503);
        }
        DB::table('orders')
            ->where('transid', $code)
            ->update([
                'user_confirm' => 1
            ]);
        return redirect('order/done');
    }

    public function update(Request $request): RedirectResponse
    {
       
        $validator = Validator::make(
            $request->all(),
            [
                'delivery_date' => 'required|date',
                'cylinder_size' => 'required|string',
                'code' => 'exists:orders,transid|required',
                'status' => 'required'
            ],
            [
                "delivery_date.required" => "Set your delivery date",
                'cylinder_size.required' => 'Set your cylinder size',

            ]
        );
        if ($validator->fails()) {
            dd($request->code);
            return back()->withErrors($validator)->withInput()->with('error');
        }
        switch ($request->status) {
            case 'Pending':
                DB::table('orders')
                    ->where('transid', $request->code)
                    ->update([
                        'status' => $request->status,
                    ]);
                break;
            case 'Confirmed':
                DB::table('orders')
                    ->where('transid', $request->code)
                    ->update([
                        'status' => $request->status,
                        'confirm_date' => date('Y-m-d H:i:s')
                    ]);
                break;
            case 'Cancelled':
                DB::table('orders')
                    ->where('transid', $request->code)
                    ->update([
                        'status' => $request->status,
                        'confirm_date' => date('Y-m-d H:i:s')
                    ]);
                break;
            case 'Picked':
                DB::table('orders')
                    ->where('transid', $request->code)
                    ->update([
                        'status' => $request->status,
                        'pick_date' => date('Y-m-d H:i:s')
                    ]);
                break;
            case 'Delivered':
                DB::table('orders')
                    ->where('transid', $request->code)
                    ->update([
                        'status' => $request->status,
                        'delivered_date' => date('Y-m-d H:i:s')
                    ]);
                break;
            default:
            dd('pending');
                return back();
                break;
        }


        $order = DB::table('orders')
            ->select('order_no')
            ->where('transid', $request->code)
            ->first();
        return redirect('/orders')->with('success', "$order->order_no updated successfully");
    }
}
