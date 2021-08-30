<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookOrder  $bookOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BookOrder $bookOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookOrder  $bookOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BookOrder $bookOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookOrder  $bookOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookOrder $bookOrder, Book $book)
    {
        $draftOrder = Order::with('books', 'status')
        ->whereHas('status', function($query){
            return $query->where('name', 'Brouillon');
        })
        ->where([['user_id', Auth::user()->id]])
        ->first();

        $draftOrder->books()->updateExistingPivot($book->id, [
            'quantity' => $request->quantity
        ]);

        $totalAmount = 0;

        foreach ($draftOrder->books as $bookItem) {
            $totalAmount = $totalAmount + ($bookItem->student_price * (BookOrder::where('book_id', $bookItem->id)->where('order_id', $draftOrder->id)->first())->quantity);
            //dump('Quantité dans la table pivot : ' . $bookItem->pivot->quantity);
        };

        $draftOrder->update(['amount' => $totalAmount]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookOrder  $bookOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookOrder $bookOrder, Book $book)
    {
        $draftOrder = Order::whereHas('status', function($query){
            $query->where('name', 'Brouillon');
        })
        ->where('user_id', Auth::user()->id)
        ->first();

        $draftOrder->update([
            'amount' => $draftOrder->amount - ($book->student_price * $draftOrder->books->find($book->id)->pivot->quantity)
        ]);
        $draftOrder->books()->detach($book->id);

        if($draftOrder->books()->count() === 0){
            $draftOrder->delete();
        };

        toastr()->success('Le livre à bien été supprimé du panier', 'Livre supprimé');
        return redirect()->back();
    }
}
