<form class="form-grid" action="{{ route('mailcoach.emailLists.tag.store', $emailList) }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create tag')"/>
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
