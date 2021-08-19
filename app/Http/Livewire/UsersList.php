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
    public $student;

    protected $queryString = [
        'group',
        'student',
    ];

    public function render()
    {
        $users = User::where('id', '!=', Auth::user()->id)
        ->where("name", "LIKE", '%' . $this->student . '%')
        ->where("group", "LIKE", '%' . $this->group . '%')
        ->paginate(10);

        $usersGroup = User::groupBy('group')->pluck('group');
        return view('livewire.users-list', compact('users', 'usersGroup'));
    }
}
