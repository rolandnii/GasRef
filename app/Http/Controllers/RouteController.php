<?php

namespace App\Http\Controllers;

use App\Models\Cylinder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    public function dashboard(): View
    {

        if (Auth::user()->user_type == 'admin') {
            $orders = DB::table('orders')
                ->where('user_confirm', 1)
                ->where('deleted', 0)
                ->count();
            $pendingTodayOrder =  DB::table('orders')
            ->where('user_confirm',1)
            ->where('order_date',date('Y-m-d'))
            ->where('deleted', 0)
            ->count();
            $pendingOrder =  DB::table('orders')
            ->where('user_confirm',1)
            ->where('status','Pending')
            ->where('deleted', 0)
            ->count();
            return view('admin',compact('orders','pendingTodayOrder','pendingOrder'));
        }
        $myOrders = DB::table('orders')
            ->where('user_code', auth()->user()->user_code)
            ->where('user_confirm', 1)
            ->where('deleted',0)
            ->count();
        return view('customer', compact('myOrders'));
    }

    public function placeOrder(): View
    {


        $cylinders = DB::table('cylinder')
            ->select('size')
            ->where('deleted', 0)
            ->get();
        return view('modules.order.index', compact('cylinders'));
    }

    public function confirmOrder(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'delivery_date' => 'required|date',
                'cylinder_size' => 'required|string',
            ],
            [
                "delivery_date.required" => "Set your delivery date",
                'cylinder_size.required' => 'Set your cylinder size',
            ]
        );
        if ($validator->fails()) {
            Log::error(join(', ', $validator->errors()->all()));
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        $displayDeliveryDate = date('jS M Y', strtotime($request->delivery_date));
        $deliveryDate = $request->delivery_date;
        $cylinderSize = $request->cylinder_size;

        $subTotal = DB::table('cylinder')
            ->select('price')
            ->where('size', $request->cylinder_size)
            ->first();
        //dummy delivery rate
        $deliveryRate = 15.00;
        $discount = 0.00;
        //calculate total
        $total = $subTotal->price + $deliveryRate - $discount;
        $orders = DB::table('orders')
            ->where('deleted', 0)
            ->count();

        $order =   (int)  (date('Y') . date('m') . '0000') + $orders + 1;
        $orderId = '#' . (string) $order;
        $transid = bin2hex(random_bytes(3));

        Order::create(
            [
                'transid' => $transid,
                'order_no' => $orderId,
                'user_code' => auth()->user()->user_code,
                'cylinder_size' => $cylinderSize,
                'delivery_date' => $deliveryDate,
                'total' => $total,
                'subtotal' => $subTotal->price,
                'delivery' => $deliveryRate,
                'discount' => $discount,
                'order_date' => date("Y-m-d H:i:s"),
                'deleted' => 0,
                'status' => "Pending",
                'user_confirm' => 0,
            ]
        );
        DB::commit();
        return view('modules.order.confirm', compact('displayDeliveryDate', "deliveryDate", "cylinderSize", "subTotal", "deliveryRate", "discount", "total", 'transid'));

        DB::rollBack();

        return back();
    }

    public function orderDone(): View
    {

        return view('modules.order.finish');
    }

    public function allMyOrders(): View
    {
        if(auth()->user()->user_type == 'admin')
        {
            $myOrders = DB::table('orders')
            ->select('orders.transid as code','orders.*','tbluser.fname as fname','tbluser.lname as lname','tbluser.phone','tbluser.email')
            ->join('tbluser','orders.user_code','tbluser.user_code')
            ->where('orders.user_confirm', 1)
            ->where('orders.deleted',0)
            ->orderByDesc('order_date')
            ->get();
            $cylinders = DB::table('cylinder')
            ->select('size')
            ->where('deleted', 0)
            ->get();
            return view('modules.admin.orders.index',compact('myOrders','cylinders'));
        }
        $myOrders = DB::table('orders')
            ->where('user_code', auth()->user()->user_code)
            ->where('user_confirm', 1)
            ->get();
        return view('modules.customerorders.index', compact('myOrders'));
    }
}
