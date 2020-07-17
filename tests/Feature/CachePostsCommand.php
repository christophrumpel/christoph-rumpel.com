<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CachePostsCommand extends TestCase
{
    /** @test **/
    public function it_caches_posts_when_command_run(): void
    {
        $this->assertFalse(Cache::has('posts'));

        $this->artisan('posts:cache');

        $this->assertTrue(Cache::has('posts'));

        $posts = Cache::get('posts');
        $this->assertCount(count(Storage::disk('posts')->allFiles()), $posts);
    }
}
