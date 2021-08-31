<?php

namespace App\Http\Controllers;

use App\Jobs\cartConfirmedJob;
use App\Mail\OrderStatusChanged;
use App\Models\Order;
use App\Models\Status;
use App\Models\OrderStatus;
use App\Notifications\CartConfirmedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderStatusController extends Controller
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
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus, Order $order)
    {
        $order->load('user', 'status', 'books');
        $order->status()->attach((Status::where('id', $request->status)->first())->id);
        $status = Status::where('id', $request->status)->first();
        Mail::to($order->user->email)->send(new OrderStatusChanged($order, $status));
        return redirect('orders');
    }

    /**
     * Update the specified draft order to the waiting status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function updateDraftOrder(Request $request, OrderStatus $orderStatus, Order $order)
    {
        $order->status()->sync(Status::where('name', 'Commandé')->first());
        //Auth::user()->notify(new CartConfirmedNotification($order));
        $user = Auth::user();
        cartConfirmedJob::dispatch($user,$order);
        $order->load('status');
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        //
    }
}
