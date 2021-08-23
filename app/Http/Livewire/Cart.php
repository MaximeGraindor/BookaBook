<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{

    public $draftOrder;

    public function mount(){
        $this->draftOrder = Order::whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();
    }

    public function deleteBook($book){
        $this->draftOrder->update(['amount' => ($this->draftOrder->amount - $book['student_price'])]);
        $this->draftOrder->books()->detach($book['id']);
        if($this->draftOrder->books()->count() === 0){
            $this->draftOrder->delete();
        };
    }
    public function updateQuantity($book){
        $this->draftOrder->update(['amount' => ($this->draftOrder->amount - $book['student_price'])]);
        $this->draftOrder->books()->detach($book['id']);
        if($this->draftOrder->books()->count() === 0){
            $this->draftOrder->delete();
        };
    }

    public function render()
    {
        $draftOrder = Order::with('books')->whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();
        return view('livewire.cart',compact('draftOrder'));
    }
}
