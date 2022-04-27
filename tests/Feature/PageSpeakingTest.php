<?php

namespace Tests\Feature;

use Tests\Factories\TalkFactory;
use Tests\TestCase;

class PageSpeakingTest extends TestCase
{
    /** @test * */
    public function it_shows_past_and_upcoming_talks(): void
    {
        TalkFactory::create([
            [
                'title' => 'Talk Upcoming',
                'date' => '20.02.2029',
                'location' => 'Talk Location',
                'event' => 'Event Name',
                'url' => 'https://test.at',
            ],
            [
                'title' => 'Talk Past',
                'date' => '20.02.2020',
                'location' => 'Talk Location',
                'event' => 'Event Name',
                'url' => 'https://test.at',
            ],
        ]);

        $this->get('/speaking')
            ->assertSuccessful()
            ->assertSeeInOrder([
                'Talk Upcoming',
                'Talk Past'
            ]);
    }

    /** @test * */
    public function it_works_with_no_upcoming_talks(): void
    {
        TalkFactory::create([
            [
                'title' => 'Talk Title',
                'date' => '20.02.2020',
                'location' => 'Talk Location',
                'event' => 'Event Name',
                'url' => 'https://test.at',
            ],
        ]);

        $this->get('/speaking')
            ->assertSuccessful();
    }
}
