<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $draftOrder = Order::whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();
        return view('pages.cart', compact('draftOrder'));
    }
}
