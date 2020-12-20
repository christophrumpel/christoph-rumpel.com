@push('modals')
    <div class="modal-backdrop | {{ ($open ?? false) ? '' : 'hidden' }}" data-modal="{{ $name }}" data-modal-backdrop>
        <div class="modal-wrapper @isset($large) modal-wrapper-lg @endisset">
            <button class="modal-close" tabindex="-1" data-modal-dismiss>
                <i class="fas fa-times"></i>
            </button>
            <div class="modal">
                @isset($title)
                    <header class="modal-header">
                        <span class="modal-title">{{ $title }}</span>
                    </header>
                @endisset
                <div class="modal-content scrollbar">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endpush
