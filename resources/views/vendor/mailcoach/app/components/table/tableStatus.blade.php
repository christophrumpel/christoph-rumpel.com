<p class="table-status">
    {{ __('Displaying :count of :totalCount :resource', [
        'count' => number_format($paginator->count()),
        'totalCount' => number_format($totalCount),
        'resource' => trans_choice($name, $totalCount)
    ]) }}.
    @if($paginator->total() !== $totalCount)
        <a href="{{ $showAllUrl }}" class="link-dimmed" data-turbolinks="false">
            {{ __('Show all') }}
        </a>
    @endif
</p>

{{ $paginator->appends(request()->input())->links('mailcoach::app.components.table.pagination') }}
