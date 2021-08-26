<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Publisher;

class PublishersList extends Component
{

    public $name;

    protected $rules = [
        'name' => 'required|min:4',
    ];

    public function render()
    {
        $publishers = Publisher::all();
        return view('livewire.publishers-list', [
            'publishers' => $publishers
        ]);
    }

    public function store(){
        $this->validate();
        Publisher::create([
            'name' => $this->name,
        ]);
    }

    public function delete($publisher){
        Publisher::destroy($publisher);
    }
}
