<form class="form-grid" action="{{ route('mailcoach.emailLists.segment.store', $emailList) }}" method="POST">
    @csrf
    <x-mailcoach::text-field :label="__('Name')" name="name" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create segment')" />
        
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
