@if ($tag->type === \Spatie\Mailcoach\Domain\Campaign\Enums\TagType::MAILCOACH)
    <span class="tag">
        <span class="inline-block w-8 -ml-2 py-1 pl-2 mr-1 rounded-full bg-blue-400">
            @include('mailcoach::app.layouts.partials.logoSvg')
        </span>
        {{ str_replace('mc::', '', $tag->name) }}
    </span>
@else
    <span class="tag">{{ $tag->name }}</span>
@endif
