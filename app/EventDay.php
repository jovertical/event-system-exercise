<?php

namespace App;

class EventDay extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
