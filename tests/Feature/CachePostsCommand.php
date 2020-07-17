<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CachePostsCommand extends TestCase
{
    /** @test **/
    public function it_caches_posts_when_command_run(): void
    {
        $this->assertFalse(Cache::has('posts'));

    	$this->artisan('posts:cache');

    	$this->assertTrue(Cache::has('posts'));
    }
}
