<?php

namespace Tests\Unit;

use App\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_day()
    {
        $event = factory(Event::class)->create();
        $eventDay = $event->createDay(['date' => now()->format('Y-m-d')]);

        $this->assertCount(1, $event->days);
        $this->assertTrue($event->days->contains($eventDay));
    }

    /** @test */
    public function an_event_has_days()
    {
        $event = factory(Event::class)->create();

        $this->assertInstanceOf(Collection::class, $event->days);
    }
}
