<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Order;
use Livewire\Component;
use App\Models\BookOrder;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{

    public $quantity;

    public function deleteBook($book){
        $draftOrder = Order::whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();

        $draftOrder->update([
            'amount' => $draftOrder->amount - ((Book::where('id',$book)->first())->student_price * $draftOrder->books->find($book)->pivot->quantity)
        ]);
        $draftOrder->books()->detach($book);

        if($draftOrder->books()->count() === 0){
            $draftOrder->delete();
        };
    }
    public function updateQuantity($selectValue, $book){
        $draftOrder = Order::with('books', 'status')
        ->whereHas('status', function($query){
            return $query->where('name', 'Brouillon');
        })
        ->where([['user_id', Auth::user()->id]])
        ->first();

        $draftOrder->books()->updateExistingPivot($book, [
            'quantity' => $selectValue
        ]);

        $totalAmount = 0;

        foreach ($draftOrder->books as $bookItem) {
            $totalAmount = $totalAmount + ($bookItem->student_price * (BookOrder::where('book_id', $bookItem->id)->where('order_id', $draftOrder->id)->first())->quantity);
        };

        $draftOrder->update(['amount' => $totalAmount]);

        return redirect()->back();
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
