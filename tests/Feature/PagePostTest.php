<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
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

    #[DataProvider('emptyCategories')]
    public function test_it_shows_posts_without_categories(string $categories): void
    {
        Storage::fake('posts');
        Storage::disk('posts')->put('2016-02-20.uncategorized-post.md', "---\ntitle: Uncategorized post\n{$categories}\n---\nArticle content");

        $this->get('/2016/2/uncategorized-post')
            ->assertSuccessful()
            ->assertSee('Uncategorized post')
            ->assertSee('Article content');
    }

    public static function emptyCategories(): array
    {
        return [
            'missing' => [''],
            'blank' => ['categories: ""'],
            'whitespace' => ['categories: "   "'],
        ];
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
