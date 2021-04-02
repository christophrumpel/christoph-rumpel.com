<x-mailcoach::layout-transactional
    :title="__('Resend')"
    :transactionalMail="$transactionalMail"
>
    @if($transactionalMail->opens->count())
        <x-mailcoach::warning>{{ __('This mail has already been opened, are you sure you want to resend it?') }}</x-mailcoach::warning>
    @else
        <x-mailcoach::help>{{ __('This mail hasn\'t been opened yet.') }}</x-mailcoach::help>
    @endif

    <x-mailcoach::form-button class="mt-4 button" action="{{ route('mailcoach.transactionalMail.resend', $transactionalMail) }}">
        {{__('Resend')}}
    </x-mailcoach::form-button>
</x-mailcoach::layout-transactional>
