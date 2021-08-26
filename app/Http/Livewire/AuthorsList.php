<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorsList extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:4',
    ];

    public function render()
    {
        $authors = Author::all();
        return view('livewire.authors-list', [
            'authors' => $authors
        ]);
    }

    public function store(){
        $this->validate();
        Author::create([
            'name' => $this->name,
        ]);
    }

    public function delete($author){
        Author::destroy($author);
    }
}
