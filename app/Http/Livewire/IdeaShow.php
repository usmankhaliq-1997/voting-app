<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function vote()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }


        if ($this->hasVoted) {
            $this->idea->removeVote($user);
            $this->votesCount--;
            $this->hasVoted = false;
            return;
        }

        $this->idea->vote($user);
        $this->votesCount++;
        $this->hasVoted = true;
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
