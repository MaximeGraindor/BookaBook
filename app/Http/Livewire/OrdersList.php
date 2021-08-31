<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\OrderStatusChanged;
use App\Jobs\OrderStatusChangedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrdersList extends Component
{

    use WithPagination;

    //public $selectedStatus = null;
    public $command;
    public $student;

    protected $queryString = [
        'command',
        'student',
    ];

    public function render()
    {
        $orders = Order::with('user', 'status')
        ->whereHas('status', function($query){
            $query->where('name', '!=', 'Brouillon');
        })
        ->whereHas('user', function($query){
            $query->where('name', "LIKE", '%' . $this->student . '%');
        })
        ->where("number", "LIKE", '%' . $this->command . '%')
        ->paginate(10);
        $statuses = Status::all();
        return view('livewire.orders-list', [
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }

    public function updateOrder($statutId, $order){
        $order = Order::with('status')->where('id', $order)->first();
        $order->status()->attach($statutId, [
            'updated_at' => Carbon::now()
        ]);
        $user = Auth::user();
        $status = Status::where('id', $statutId)->first();
        OrderStatusChangedJob::dispatch($user, $order, $status);
        //Mail::to($order->user->email)->send(new OrderStatusChanged($order, $status));
        $this->emit('alert', [
            'type' => 'Statut mis à jour',
            'message' => 'la commande '. $order->number .' a bien été mise à jour !'
        ]);
    }
}
