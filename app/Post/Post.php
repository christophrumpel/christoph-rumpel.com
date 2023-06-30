<?php

namespace App\Post;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post implements Feedable
{
    public string $path;

    public string $title;

    public array $categories = [];

    public string $previewImage;

    public string $previewImageTwitter;

    public string $content;

    public \Carbon\Carbon $date;

    public string $slug;

    public string $summary;

    public $old;

    public bool $hidden;

    public ?\Carbon\Carbon $updated = null;

    public function __construct()
    {
    }

    public function create(array $attributes): self
    {
        $this->path = $attributes['path'];
        $this->title = $attributes['title'] ?? '';
        $this->categories = $attributes['categories'] ?? [];
        $this->previewImage = $attributes['preview_image'] ?? '';
        $this->previewImageTwitter = $attributes['preview_image_twitter'] ?? '';
        $this->content = $attributes['content'] ?? '';
        $this->date = Carbon::createFromFormat('Y-m-d', $attributes['date']);
        $this->slug = $attributes['slug'] ?? '';
        $this->summary = $attributes['summary'] ?? '';
        $this->old = $attributes['old'] ?? false;
        $this->hidden = $attributes['hidden'] ?? false;
        $this->updated = $attributes['updated'] ? Carbon::createFromFormat('Y-m-d', $attributes['updated']) : null;

        return $this;
    }

    public function link(): string
    {
        return route('page.post', ['year' => $this->date->year, 'month' => $this->date->month, 'slug' => $this->slug]);
    }

    public static function getFeedItems(): Collection
    {
        return PostCollector::all();
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->link())
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->date)
            ->link($this->link())
            ->authorName('Christoph Rumpel')
            ->authorEmail('christoph@christoph-rumpel.com');
    }
}
