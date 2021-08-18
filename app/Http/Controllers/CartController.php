<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $draftOrder = Order::with('books')->whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();

        $draftOrderBookQuantity = 0;

        if(($draftOrder->books)->count()){
            foreach ($draftOrder->books as $book) {
                $draftOrderBookQuantity += $book->pivot->quantity;
            }
        }else{
            $draftOrderBookQuantity = 0;
        }


        $draftOrderBookQuantity;

        return view('pages.cart', compact('draftOrder'));
    }
}
