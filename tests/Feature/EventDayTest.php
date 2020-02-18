<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventDayTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_an_event()
    {
        $event = factory(Event::class)->create();
        $eventDay = $event->createDay(['date' => now()->format('Y-m-d')]);

        $this->assertInstanceOf(Event::class, $eventDay->event);
    }
}
