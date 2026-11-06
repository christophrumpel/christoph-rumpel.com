<?php

namespace App\Post;

use Illuminate\Support\Facades\Storage;
use League\CommonMark\CommonMarkConverter;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class FileToPostMapper
{
    public static function map(string $fileName): Post
    {
        $filePath = Storage::disk('posts')
                ->path($fileName);

        $postMetaData = YamlFrontMatter::parse(file_get_contents($filePath));
        [
            $date,
            $slug,
        ] = explode('.', $fileName);

        $categories = trim($postMetaData->matter('categories') ?? '');

        return (new Post)->create([
            'path' => $filePath,
            'title' => $postMetaData->matter('title'),
            'categories' => $categories === '' ? [] : explode(', ', strtolower($categories)),
            'preview_image' => $postMetaData->matter('preview_image'),
            'preview_image_twitter' => $postMetaData->matter('preview_image_twitter'),
            'content' => app(CommonMarkConverter::class)->convertToHtml($postMetaData->body()),
            'date' => $date,
            'slug' => $slug,
            'summary' => $postMetaData->matter('summary'),
            'old' => $postMetaData->matter('old') ?? false,
            'hidden' => $postMetaData->matter('hidden'),
            'updated' => $postMetaData->matter('updated'),
        ]);
    }
}
