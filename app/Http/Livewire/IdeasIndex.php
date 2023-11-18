<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{

    use WithPagination;

    public $status ;
    public $catagory;
    public $filter;

    protected $queryString = [
        'status','catagory','filter'
    ];


    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount(){
        $this->status = request()->status ?? 'All' ;
    }

    public function updatingCatagory(){
        $this->resetPage();
    }

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage();
        $this->status = $newStatus;
        
    }
     
    public function updatedFilter(){
        if($this->filter === "My Ideas"){
            if(!auth()->check()){
                return redirect()->route('login');
            }
        }
    }

    public function updatingFilter(){
        $this->resetPage();
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');

        $catagories = Catagory::all();

        return  view('livewire.ideas-index', ['ideas' => Idea::with('user', 'catagory', 'status')
            ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                return $query->where('status_id', $statuses->get($this->status));
            })
            ->when($this->catagory && $this->catagory !== 'All Catagories', function ($query) use ($catagories) {
                return $query->where('catagory_id', $catagories->pluck('id','name')->get($this->catagory));
            })
            ->when($this->filter && $this->filter == "Top Voted", function ($query)  {
                return $query->orderByDesc('votes_count');
            })
            ->when($this->filter && $this->filter === 'My Ideas', function ($query)  {
                return $query->where('user_id',auth()->id());
            })
            ->addSelect([
                'voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
            ])
            ->withCount('votes')
            ->orderBy('id', 'desc')
            ->simplePaginate(Idea::PAGINATION_COUNT),
            'catagories' => $catagories
        ]);
    }
}
