<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Task extends Model
{
    use HasTags;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'creator_id',
        'assigned_to_id',
        'tags'
    ];

    public function scopeUserTasks($query, $user)
    {
        return $query->where('creator_id', 'like', "%$user%");
    }

    public function scopeTaskWithStatus($query, $status)
    {
        return $query->where('status_id', 'like', "%$status%");
    }

    public function scopeAssignedToTasks($query, $assignedTo)
    {
        return $query->where('assigned_to_id', 'like', "%$assignedTo%");
    }

    public function scopeTag($query, $tag)
    {
        return $query->whereHas('tags', function ($query) use ($tag) {
            return $query->where('name', 'like', "%$tag%");
        });
    }

    public function assignedTo()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\TaskStatus');
    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    // public function tag()
    // {
    //     return $this->belongsToMany('App\Tag');
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany('App\Tag');
    // }
}
