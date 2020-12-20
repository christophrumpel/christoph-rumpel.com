<form
    method="POST"
    action="{{ $action }}"
    @isset($dataConfirm) data-confirm="true" @endisset
    @isset($dataConfirmText) data-confirm-text="{{ $dataConfirmText }}" @endisset
>
    @csrf
    @method($method ?? 'POST')
        <button
            type="submit"
            class="{{ $class ?? '' }}"
        >
            {{ $slot }}
        </button>
</form>
