<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){

        $users =Auth::User();
        return view('main.index', compact('users'));

    }
        
    
}
