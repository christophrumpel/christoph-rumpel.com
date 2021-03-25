<x-mailcoach::layout-list :title="__('Mailers')" :emailList="$emailList">
    <form class="form-grid" method="POST">
        @csrf
        @method('PUT')

        @if(count(config('mail.mailers')) > 1)
            <x-mailcoach::fieldset :legend="__('Mailers')">

            <div class="form-field">
                <label class="label">{{ __('Campaign mailer') }}</label>
                <div class="radio-group">
                    @foreach (config('mail.mailers') as $key => $settings)
                        <x-mailcoach::radio-field
                            name="campaign_mailer"
                            :option-value="$key"
                            :value="$emailList->campaign_mailer"
                            :label="$key"
                        />
                    @endforeach
                </div>
            </div>
            <x-mailcoach::help>{{ __('The mailer used for sending campaigns.') }}</x-mailcoach::help>


            <div class="form-field">
                <label class="label">{{ __('Transactional mailer') }}</label>
                <div class="radio-group">
                    @foreach (config('mail.mailers') as $key => $settings)
                        <x-mailcoach::radio-field
                            name="transactional_mailer"
                            :option-value="$key"
                            :value="$emailList->transactional_mailer"
                            :label="$key"
                        />
                    @endforeach
                </div>
            </div>
            <x-mailcoach::help>{{ __('The mailer used for sending confirmation and welcome mails.') }}</x-mailcoach::help>

            </x-mailcoach::fieldset>
        @endif

        <div class="form-buttons">
            <x-mailcoach::button :label="__('Save')"/>
        </div>
    </form>
</x-mailcoach::layout-list>

