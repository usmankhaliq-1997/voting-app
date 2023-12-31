<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return Vote::where('user_id', $user->id)->where('idea_id', $this->id)->exists();
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function vote(User $user){
            Vote::create([
                'idea_id' => $this->id,
                'user_id' => $user->id
            ]);
    }

    public function removeVote(User $user){
        Vote::where('idea_id',$this->id)
        ->where('user_id',$user->id)
        ->first()
        ->delete();
}
}
