<x-mailcoach::layout-list :title="__('Tags')" :emailList="$emailList">
    <div class="table-actions">
        <x-mailcoach::button :label="__('Create tag')" data-modal-trigger="create-tag"/>

        <x-mailcoach::modal :title="__('Create tag')" name="create-tag" :open="$errors->any()">
            @include('mailcoach::app.emailLists.tags.partials.create')
        </x-mailcoach::modal>

        @if($totalTagsCount > 0 || $searching)
            <div class="table-filters">
                <x-mailcoach::filters>
                    <x-mailcoach::filter :queryString="$queryString" attribute="type" active-on="">
                        {{ __('All') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($totalTagsCount) }}</span>
                    </x-mailcoach::filter>
                    <x-mailcoach::filter :queryString="$queryString" attribute="type" active-on="{{ \Spatie\Mailcoach\Domain\Campaign\Enums\TagType::DEFAULT }}">
                        {{ __('Default') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($totalDefault) }}</span>
                    </x-mailcoach::filter>
                    <x-mailcoach::filter :queryString="$queryString" attribute="type" active-on="{{ \Spatie\Mailcoach\Domain\Campaign\Enums\TagType::MAILCOACH }}">
                        {{ __('Mailcoach') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($totalMailcoach) }}</span>
                    </x-mailcoach::filter>
                </x-mailcoach::filters>

                <x-mailcoach::search :placeholder="__('Filter tags…')"/>
            </div>
        @endif
    </div>

    @if($totalTagsCount > 0)
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="name" sort-default>{{ __('Name') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="subscriber_count" class="w-32 th-numeric">{{ __('Subscribers') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="updated_at" class="w-48 th-numeric hidden | xl:table-cell">{{ __('Updated at') }}</x-mailcoach::th>
                <th class="w-12"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td class="markup-links">
                        @if ($tag->type === \Spatie\Mailcoach\Domain\Campaign\Enums\TagType::DEFAULT)
                            <a class="break-words" href="{{ route('mailcoach.emailLists.tag.edit', [$emailList, $tag]) }}">
                                {{ $tag->name }}
                            </a>
                        @else
                            {{ $tag->name }}
                        @endif
                    </td>
                    <td class="td-numeric">{{ $tag->subscriber_count }}</td>
                    <td class="td-numeric hidden | xl:table-cell">{{ $tag->updated_at->toMailcoachFormat() }}</td>

                    <td class="td-action">
                        <x-mailcoach::form-button
                            :action="route('mailcoach.emailLists.tag.delete', [$emailList, $tag])"
                            method="DELETE"
                            data-confirm="true"
                            :data-confirm-text="__('Are you sure you want to delete tag :tagName?', ['tagName' => $tag->name])"
                            class="icon-button hover:text-red-500"
                        >
                            <i class="far fa-trash-alt"></i>
                        </x-mailcoach::form-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status
            :name="__('tag|tags')"
            :paginator="$tags"
            :total-count="$totalTagsCount"
            :show-all-url="route('mailcoach.emailLists.tags', $emailList)"
        ></x-mailcoach::table-status>
    @else
        <x-mailcoach::help>
            @if($searching)
                {{ __('No tags found') }}
            @else
                {{ __('There are no tags for this list. Everyone equal!') }}
            @endif
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-list>
