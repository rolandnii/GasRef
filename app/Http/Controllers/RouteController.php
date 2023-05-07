<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function confirmOrder(): View
    {
        return view('modules.order.confirm');
    }

}
