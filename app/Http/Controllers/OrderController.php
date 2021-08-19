<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Status;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with('user', 'status')
        ->whereHas('status', function($query){
            $query->where('name', '!=', 'Brouillon');
        })
        ->where("number", "LIKE", '%' . $request->search . '%')
        ->paginate(10);
        $statuses = Status::all();

        return view('pages.orders', compact('orders', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draftOrder = Order::whereHas('status', function($query){
                $query->where('name', 'Brouillon');
            })
            ->where('user_id', Auth::user()->id)
            ->first();



        if($draftOrder){
            if(BookOrder::where([['order_id', $draftOrder->id], ['book_id', $request->bookId]])->first()){
                $bookOrder = BookOrder::where([['order_id', $draftOrder->id], ['book_id', $request->bookId]])->first();
                $bookOrder->update(['quantity' => $bookOrder->quantity + 1]);
            }else{
                $draftOrder->books()->attach($request->bookId, ['quantity' => 1]);
                $draftOrder->update(['amount' => ($draftOrder->amount + (Book::where('id', $request->bookId)->first())->student_price)]);
            }
        }else{
            $order = new Order();
            $LastNumberOfLastOrder = Order::all()->last() ? substr(((Order::all()->last())->number),4) : '' ;
            $order->number = $LastNumberOfLastOrder ? substr(Carbon::now()->year, -2) . substr((Carbon::now()->year+1), -2) . ($LastNumberOfLastOrder+1) : substr(Carbon::now()->year, -2) . substr((Carbon::now()->year+1), -2) . 1;
            $order->amount = (Book::where('id', $request->bookId)->first())->student_price;
            $order->user_id = Auth::user()->id;
            $order->save();

            $order->books()->attach($request->bookId, ['quantity' => 1]);
            $order->status()->attach(Status::where('name', 'Brouillon')->first());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $order = Order::with('user', 'status', 'books')
        ->where([
            ['user_id',(User::where('slug', $request->segment(2))->first())->id],
            ['number', $request->segment(4)]
        ])->first();


        return view('pages.order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
