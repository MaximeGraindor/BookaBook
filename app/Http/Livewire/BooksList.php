<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use App\Models\BookOrder;
use Illuminate\Support\Facades\Auth;

class BooksList extends Component
{

    public $bookId;

    public function render()
    {
        $draftOrder = Order::with('books')->whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();
        $books = Book::all();
        return view('livewire.books-list', [
            'books' => $books,
            'draftOrder' => $draftOrder
        ]);
    }

    public function test($bookId)
    {
        dd($bookId);
    }

    public function addBookToCart($bookId)
    {
        $draftOrder = Order::whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();

        $bookName = (Book::where('id', $bookId)->first())->name;

        if($draftOrder){
            if(BookOrder::where([['order_id', $draftOrder->id], ['book_id', $bookId]])->first()){
                $bookOrder = BookOrder::where([['order_id', $draftOrder->id], ['book_id', $bookId]])->first();
                $bookOrder->update(['quantity' => $bookOrder->quantity + 1]);
                $draftOrder->update(['amount' => ($draftOrder->amount + (Book::where('id', $bookId)->first())->student_price)]);
            }else{
                $draftOrder->books()->attach($bookId, ['quantity' => 1]);
                $draftOrder->update(['amount' => ($draftOrder->amount + (Book::where('id', $bookId)->first())->student_price)]);
            }
        }else{
            $order = new Order();
            $LastNumberOfLastOrder = Order::all()->last() ? substr(((Order::all()->last())->number),4) : '' ;
            $order->number = $LastNumberOfLastOrder ? substr(Carbon::now()->year, -2) . substr((Carbon::now()->year+1), -2) . ($LastNumberOfLastOrder+1) : substr(Carbon::now()->year, -2) . substr((Carbon::now()->year+1), -2) . 1;
            $order->amount = (Book::where('id', $bookId)->first())->student_price;
            $order->user_id = Auth::user()->id;
            $order->save();

            $order->books()->attach($bookId, ['quantity' => 1]);
            $order->status()->attach(Status::where('name', 'Brouillon')->first());
        }
        $this->emit('alert', [
            'type' => 'Livré ajouté',
            'message' => 'Le livre '. $bookName .' a bien été ajouté au panier!'
        ]);
    }
}
