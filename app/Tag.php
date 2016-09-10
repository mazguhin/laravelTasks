<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    protected $fillable = ['name'];
}
