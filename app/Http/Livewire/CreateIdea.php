<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\Idea;
use Livewire\Component;

class CreateIdea extends Component
{
    public $title;
    public $catagory = 1;
    public $description;

    protected $rules = [

        'title' => 'required|min:4',
        'catagory' => 'required|integer',
        'description' => 'required|min:4'
    ];

    public function createIdea()
    {

        $this->validate();

        Idea::create([
            'user_id' => auth()->user()->id,
            'catagory_id' => $this->catagory,
            'title' => $this->title,
            'status_id' => 1,
            'description' => $this->description
        ]);

        $this->reset();

        session()->flash('success_message', 'Idea was added Successfully');

        return redirect()->route('idea.index');
    }

    public function render()
    {
        return view('livewire.create-idea', ['catagories' => Catagory::all()]);
    }
}
