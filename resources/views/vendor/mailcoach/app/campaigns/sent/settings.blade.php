@extends('mailcoach::app.campaigns.sent.layouts.show', [
    'campaign' => $campaign,
    'titlePrefix' => __('Used settings'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.campaigns.summary', $campaign) }}">
            <span class="breadcrumb">{{ $campaign->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Used settings') }}</span></li>
@endsection

@section('campaign')
    <table>
        <tbody>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('Name') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    {{ $campaign->name }}
                </td>
            </tr>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('Subject') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    {{ $campaign->subject }}
                </td>
            </tr>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('List') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    {{ $campaign->emailList->name }}
                </td>
            </tr>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('Segment') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    {{ $campaign->segment_description }}
                </td>
            </tr>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('Track opens') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if ($campaign->track_opens)
                        <i class="fas fa-check-circle text-green-800"></i>
                    @else
                        <i class="fas fa-times-circle text-red-800"></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">{{ __('Track clicks') }}</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if ($campaign->track_clicks)
                        <i class="fas fa-check-circle text-green-800"></i>
                    @else
                        <i class="fas fa-times-circle text-red-800"></i>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endsection
