<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status_id',
        'creator_id',
        'assigned_to_id',
        'tags'
    ];

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
