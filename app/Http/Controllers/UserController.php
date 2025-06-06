<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index(){

        $users =Auth::User();
        $countProduct = Product::count();

        return view('main.index', compact('users','countProduct'));

    }
        
    
}
