<?php

namespace Tests\Feature;

use App\Actions\GetTalksAction;
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
}
