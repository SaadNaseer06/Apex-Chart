<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $thisyearorders = Order::query()
        ->whereYear('created_at' , date('Y'))
        ->groupByMonth();

        $lastyearorders = Order::query()
        ->whereYear('created_at' , date('Y') - 1)
        ->groupByMonth();

        return view('charts' , compact('thisyearorders' , 'lastyearorders'));
    }
}
