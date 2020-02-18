<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsApiControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_the_events()
    {
        factory(Event::class, 50);

        $this->get(route('events.index'))
            ->assertOk()
            ->assertJson(Event::with('days')->get()->toArray());
    }

    /** @test */
    public function it_can_create_an_event()
    {
        $data = [
            'name' => 'My Event',
            'from' => now()->format('Y-m-d'),
            'to' => now()->addDays(14)->format('Y-m-d'),
            'days' => ['Mon', 'Wed', 'Fri'],
        ];

        $this->post(route('events.store'), $data)
            ->assertOk()
            ->assertJson(Event::with('days')->first()->toArray());

        $this->assertDatabaseHas('events', ['name' => $data['name']]);
    }
}
