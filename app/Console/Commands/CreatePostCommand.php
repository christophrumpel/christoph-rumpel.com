<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreatePostCommand extends Command
{
    protected $signature = 'post:create {title : The title of the blog post}';

    protected $description = 'Create a new blog post template';

    public function handle(): int
    {
        $title = $this->argument('title');
        $slug = Str::slug($title);
        $date = Carbon::now()->format('Y-m-d');

        $filename = "{$date}.{$slug}.md";
        $path = base_path("content/posts/{$filename}");

        if (file_exists($path)) {
            $this->error("Post already exists: {$filename}");

            return 1;
        }

        $content = <<<MARKDOWN
---
title: {$title}
categories:
summary: ""
hidden: true
preview_image: images/blog/headers/
preview_image_twitter: images/blog/headers/
---

MARKDOWN;

        file_put_contents($path, $content);

        $this->info("Post created: content/posts/{$filename}");

        return 0;
    }
}
