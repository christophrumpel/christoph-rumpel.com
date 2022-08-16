<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Mailcoach\Domain\Audience\Models\EmailList;
use Spatie\Mailcoach\Domain\Audience\Models\Subscriber;
use Tests\TestCase;

class SubscribeNewsletterApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lets_you_subscribe_a_user_to_a_newsletter(): void
    {
        // Arrange
        $emailList = EmailList::factory()->create();

        // Act
        $this->actingAs(User::factory()->create(['api_token' => 'my-token']))
            ->post(route('api.newsletter.subscribe'), [
                'api_token' => 'my-token',
                'email' => 'test@test.at',
                'list' => $emailList->uuid,
            ])->assertSuccessful();

        // Assert
        $this->assertTrue($emailList->subscribers()->where('email', 'test@test.at')->exists());
    }

    /** @test */
    public function it_tells_you_if_user_already_subscribed(): void
    {
        // Arrange
        Subscriber::factory()
            ->has(EmailList::factory())
            ->create(['email' => 'test@test.at']);

        // Act & Assert
        $this->actingAs(User::factory()->create(['api_token' => 'my-token']))
            ->post(route('api.newsletter.subscribe'), [
                'api_token' => 'my-token',
                'email' => 'test@test.at',
                'list' => EmailList::first()->uuid,
            ])->assertSuccessful()
            ->assertJsonFragment(['already_subscribed' => true]);
    }
}
