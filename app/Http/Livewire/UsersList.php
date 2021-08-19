<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UsersList extends Component
{
    use WithPagination;

    public $group;

    protected $queryString = [
        'group',
    ];

    public function render()
    {
        $users = User::where('id', '!=', Auth::user()->id)
        ->where("group", "LIKE", '%' . $this->group . '%')
        ->paginate(10);

        $usersGroup = User::groupBy('group')->pluck('group');
        return view('livewire.users-list', compact('users', 'usersGroup'));
    }
}
