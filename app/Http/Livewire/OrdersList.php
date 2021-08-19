<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersList extends Component
{

    use WithPagination;

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
}
