<?php

namespace App\Jobs;

use App\Mail\NotifyStatusUpdateToVotersMail;
use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyAllUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $idea;

    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->idea->votes()
        ->select('name','email')
        ->chunk(100,function($voters){
            foreach ($voters as $user) {
               Mail::to($user)
               ->queue(new NotifyStatusUpdateToVotersMail($this->idea));
            }
        });
    }
}
