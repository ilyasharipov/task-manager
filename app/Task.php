<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasTags;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'creator_id',
        'assigned_to_id',
    ];

    public function scopeUserTasks($query)
    {
        $authUser = Auth::user()->id;
        return $query->where('creator_id', 'like', "%$authUser%");
    }

    public function scopeFindTags($query, $name)
    {
        return $query->whereHas('tags', function ($query) use ($name) {
            return $query->where('id', 'like', "%$name%");
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
}
