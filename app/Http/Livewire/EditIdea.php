<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class EditIdea extends Component
{

    public $idea;
    public $catagory;
    public $title;
    public $description;

    protected $rules = [

        'title' => 'required|min:4',
        'catagory' => 'required|integer|exists:catagories,id',
        'description' => 'required|min:4'
    ];


    public function mount(Idea $idea){
       $this->idea = $idea;
       $this->title = $idea->title;
       $this->catagory = $idea->catagory_id;
       $this->description = $idea->description;

    }


    public function updateIdea(){

        if(auth()->guest() || auth()->user()->cannot('update',$this->idea)){
            abort(Response::HTTP_FORBIDDEN
        );
        }

        $this->validate();

        Idea::where('id',$this->idea->id)->update([
            'title' => $this->title,
            'catagory_id' => $this->catagory,
            'description' => $this->description
        ]);

        // fire a livewire event
        $this->emit('ideaWasUpdated');
        
        

    }

    public function render()
    {
        return view('livewire.edit-idea',
        ['categories' => Catagory::all()]);
    }
}
