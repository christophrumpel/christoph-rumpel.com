<p class="table-status">
    {{ __('Displaying :count of :totalCount :resource', ['count' => $paginator->count(), 'totalCount' => $totalCount, 'resource' => trans_choice($name, $totalCount)]) }}.
    @if($paginator->total() !== $totalCount)
        <a href="{{ $showAllUrl }}" class="link-dimmed" data-turbolinks="false">
            {{ __('Show all') }}
        </a>
    @endif
</p>

{{ $paginator->appends(request()->input())->links() }}
