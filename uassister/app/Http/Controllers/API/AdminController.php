<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewOrders()
    {
        $orders = Order::with('coffee', 'user')->get();
        return response()->json($orders, 200);
    }
}