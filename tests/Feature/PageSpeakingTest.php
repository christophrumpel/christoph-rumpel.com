<?php

namespace Tests\Feature;

use App\Actions\GetTalksAction;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\TalkFactory;
use Tests\TestCase;

class PageSpeakingTest extends TestCase
{
    /** @test */
    public function it_calls_get_talks_action(): void
    {
        // Arrange
        $original = resolve(GetTalksAction::class);

        $this->mock(GetTalksAction::class)
            ->shouldReceive('handle')
            ->once()
        ->andReturnUsing([$original, 'handle']);

        // Act && Assert
        $this->get(route('page.speaking'))
            ->assertOk();
    }

    /** @test */
    public function it_shows_talks(): void
    {
        // Arrange
        Storage::fake('talks');
        TalkFactory::create([
            [
                'title' => 'Talk Upcoming',
                'date' => '20.02.2099',
                'location' => 'Talk Location',
                'event' => 'Event Upcoming',
                'url' => 'https://test.at',
            ],
            [
                'title' => 'Talk Upcoming',
                'date' => '20.02.2000',
                'location' => 'Talk Location',
                'event' => 'Event Past',
                'url' => 'https://test.at',
            ],
        ]);

        // Act && Assert
        $this->get(route('page.speaking'))
            ->assertSeeInOrder([
                '2099-02-20 - Event Upcoming',
                '2000-02-20 - Event Past',
            ]);
    }

    /** @test */
    public function it_redirects_old_talks_route(): void
    {
        $this->get('speaking')
            ->assertRedirect(route('page.speaking'));
    }
}
