<form class="form-grid" action="{{ route('mailcoach.emailLists.subscriber.store', $emailList) }}" method="POST">
    @csrf
    <x-mailcoach::text-field :label="__('Email')" name="email" type="email" required />
    <x-mailcoach::text-field :label="__('First name')" name="first_name" />
    <x-mailcoach::text-field :label="__('Last name')" name="last_name" />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Add subscriber')" />
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
