<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index(){

        $users =Auth::User();
        $countProduct = Product::count();
        $countOrders = Orders::count();

        $totalRevenue = Orders::sum('total_price');

        return view('main.index', compact('users','countProduct','countOrders','totalRevenue'));

    }
        
    
}
