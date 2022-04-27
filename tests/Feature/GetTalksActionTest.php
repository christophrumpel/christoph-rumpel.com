<?php

namespace Tests\Feature;

use App\Actions\GetTalksAction;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\TalkFactory;
use Tests\TestCase;


class GetTalksActionTest extends TestCase
{

    /** @test */
    public function it_gets_talks_from_json(): void
    {
        // Arrange
        Storage::fake('talks');
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

        // Act
        [$pastTalks, $futureTalks] = (new GetTalksAction)->handle();

        // Assert
        $this->assertCount(1, $pastTalks);
        $this->assertCount(1, $futureTalks);
    }

    /** @test */
    public function it_returns_empty_array_if_no_talks_given(): void
    {
        // Arrange
        Storage::fake('talks');
        TalkFactory::create([]);

        // Act
        [$pastTalks, $futureTalks] = (new GetTalksAction)->handle();

        // Assert
        $this->assertEquals([], $futureTalks);

    }
}
