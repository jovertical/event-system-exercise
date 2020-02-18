<?php

namespace App;

class Event extends Model
{
    public function days()
    {
        return $this->hasMany(EventDay::class);
    }

    public function createDay($attributes)
    {
        return $this->days()->create($attributes);
    }
}
