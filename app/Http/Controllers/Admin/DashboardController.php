<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $data=Product::all();
        $ENV=Order::all();
        $GET=User::all();

        return view('backend.admin.dashboard',compact('data','ENV','GET'));
    }
}
