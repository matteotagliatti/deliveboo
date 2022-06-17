<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;
use App\Dish;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* $orders = Order::where('user_id', Auth::user()->id)->get(); */
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }
}
