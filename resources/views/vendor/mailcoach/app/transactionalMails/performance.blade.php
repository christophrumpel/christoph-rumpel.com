<x-mailcoach::layout-transactional
    :title="__('Performance')"
    :transactionalMail="$transactionalMail"
>

    <div class="form-grid">
        <x-mailcoach::fieldset :legend="__('Opens')">
             @if($transactionalMail->opens->count())
            <table class="mt-0 table table-fixed">
                <thead>
                    <tr>
                        <th>{{ __('Opened at') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactionalMail->opens as $open)
                        <tr>
                            <td>{{ $open->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <x-mailcoach::help>{{ __('This mail hasn\'t been opened yet.') }}</x-mailcoach::help>
            @endif    
        </x-mailcoach::fieldset>

        <x-mailcoach::fieldset :legend="__('Clicks')">
            @if($transactionalMail->clicksPerUrl()->count())
                <table class="mt-0 table table-fixed">
                    <thead>
                        <tr>
                            <th>{{ __('URL') }}</th>
                            <th class="th-numeric">{{ __('Click count') }}</th>
                            <th class="th-numeric">{{ __('First clicked at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactionalMail->clicksPerUrl() as $clickGroup)
                        <tr class="markup-links">
                            <td><a href="{{ $clickGroup['url'] }}" target="_blank">{{ $clickGroup['url'] }}</a></td>
                            <td class="td-numeric">{{ $clickGroup['count'] }}</td>
                            <td class="td-numeric">{{ $clickGroup['first_clicked_at'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <x-mailcoach::help>
                    {{ __('No links in this mail have been clicked yet.') }}
                </x-mailcoach::help>
            @endif
        </x-mailcoach::fieldset>
    </div>
</x-mailcoach::layout-transactional>
