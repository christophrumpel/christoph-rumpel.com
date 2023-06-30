<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\Factories\PostFactory;
use Tests\TestCase;

class PagePostTest extends TestCase
{
    /** @test * */
    public function it_shows_a_specific_post(): void
    {
        Storage::fake('posts');

        PostFactory::new()
            ->title('My Company Of One Story - Episode 3 The Transition')
            ->content('My blog content')
            ->categories(['Business', 'Laravel'])
            ->create();

        $today = Carbon::today();
        $pathDate = $today->format('y/m');

        $this->get("$pathDate/my-company-of-one-story-episode-3-the-transition")
            ->assertSuccessful()
            ->assertSee('My Company Of One Story - Episode 3 The Transition')
            ->assertSee('business')
            ->assertSee('laravel')
            ->assertSee('My blog content')
            ->assertSee($today->format('F Y'));
    }

    /** @test */
    public function it_returns_404_status_code_if_post_not_found(): void
    {
        $this->get('2020/03/test')
            ->assertNotFound();
    }

    /** @test */
    public function it_shows_updated_date(): void
    {
        Storage::fake('posts');

        PostFactory::new()
            ->title('Test Blog')
            ->content('My blog content')
            ->categories(['Business', 'Laravel'])
            ->updated('2023-01-01')
            ->create();

        $today = Carbon::today();
        $pathDate = $today->format('y/m');

        $this->get("$pathDate/test-blog")
            ->assertSuccessful()
            ->assertSee('Updated January 2023');
    }
}
