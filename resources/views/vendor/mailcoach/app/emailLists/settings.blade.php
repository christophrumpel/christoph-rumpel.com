<x-mailcoach::layout-list :title="__('Settings')" :emailList="$emailList">
    <form class="form-grid" action="{{ route('mailcoach.emailLists.settings', $emailList) }}" method="POST">
        @csrf
        @method('PUT')

        <x-mailcoach::fieldset :legend="__('Sender')">
            <x-mailcoach::text-field :label="__('Name')" name="name" :value="$emailList->name" required/>

            <x-mailcoach::text-field :label="__('From email')" name="default_from_email" :value="$emailList->default_from_email"
                        type="email" required/>

            <x-mailcoach::text-field :label="__('From name')" name="default_from_name" :value="$emailList->default_from_name"/>

            <x-mailcoach::text-field :label="__('Reply-to email')" name="default_reply_to_email" :value="$emailList->default_reply_to_email"
                        type="email"/>

            <x-mailcoach::text-field :label="__('Reply-to name')" name="default_reply_to_name" :value="$emailList->default_reply_to_name"/>
        </x-mailcoach::fieldset>

        <x-mailcoach::fieldset :legend="__('Publication')">
            <div class="form-field max-w-full">
                <x-mailcoach::checkbox-field :label="__('Make feed publicly available')" name="campaigns_feed_enabled"
                                :checked="$emailList->campaigns_feed_enabled"/>
                <a class="text-sm link" href="{{$emailList->feedUrl()}}">{{$emailList->feedUrl()}}</a>
            </div>
        </x-mailcoach::fieldset>

        <x-mailcoach::fieldset :legend="__('Notifications')">
            <div class="checkbox-group">
                <x-mailcoach::checkbox-field :label="__('Confirmation when campaign has been sent to this list')"
                                name="report_campaign_sent" :checked="$emailList->report_campaign_sent"/>
                <x-mailcoach::checkbox-field
                    :label="__('Summary of opens, clicks & bounces a day after a campaign has been sent to this list')"
                    name="report_campaign_summary" :checked="$emailList->report_campaign_summary"/>
                <x-mailcoach::checkbox-field :label="__('Weekly summary on the subscriber growth of this list')"
                                name="report_email_list_summary" :checked="$emailList->report_email_list_summary"/>
            </div>

            <x-mailcoach::text-field :placeholder="__('Email(s) comma separated')" :label="__('Email')" name="report_recipients"
                        :value="$emailList->report_recipients"/>
        </x-mailcoach::fieldset>

        <x-mailcoach::fieldset :legend="__('Subscriptions')">
            <x-mailcoach::help>
                {!! __('Learn more about <a href=":link" class="link-dimmed" target="_blank">subscription settings and forms</a>.', ['link' => 'https://mailcoach.app/docs/v2/app/lists/settings#subscriptions']) !!}
            </x-mailcoach::help>

            <div class="form-field max-w-full">
                <div class="checkbox-group">
                    <x-mailcoach::checkbox-field dataConditional="confirmation" :label="__('Require confirmation')"
                                    name="requires_confirmation"
                                    :checked="$emailList->requires_confirmation"/>

                    <x-mailcoach::checkbox-field dataConditional="post" :label="__('Allow POST from an external form')"
                                    name="allow_form_subscriptions"
                                    :checked="$emailList->allow_form_subscriptions"/>
                    <code class="markup-code text-xs ml-8 -mt-1">&lt;form action="{{$emailList->incomingFormSubscriptionsUrl()}}"&gt;</code>
                </div>
            </div>

            <div data-conditional-post="true" class="pl-8 max-w-xl">
                <x-mailcoach::tags-field
                    :label="__('Optionally, allow following subscriber tags')"
                    name="allowed_form_subscription_tags"
                    :value="$emailList->allowedFormSubscriptionTags()->pluck('name')->toArray()"
                    :tags="$emailList->tags()->pluck('name')->toArray()"
                />
            </div>
            <x-mailcoach::text-field :label="__('Optionally, allow following subscriber extra Attributes')" :placeholder="__('Attribute(s) comma separated: field1,field2')" name="allowed_form_extra_attributes" :value="$emailList->allowed_form_extra_attributes"/>
        </x-mailcoach::fieldset>


        <x-mailcoach::fieldset :legend="__('Landing Pages')">
            <x-mailcoach::help>
                {!! __('Leave empty to use the defaults. <a class="link-dimmed" target="_blank" href=":link">Example</a>', ['link' => route("mailcoach.landingPages.example")]) !!}
            </x-mailcoach::help>

            <div data-conditional-confirmation="true">
                <x-mailcoach::text-field :label="__('Confirm subscription')" placeholder="https://" name="redirect_after_subscription_pending"
                            :value="$emailList->redirect_after_subscription_pending" type="text"/>
            </div>
            <x-mailcoach::text-field :label="__('Someone subscribed')" placeholder="https://" name="redirect_after_subscribed"
                        :value="$emailList->redirect_after_subscribed" type="text"/>
            <x-mailcoach::text-field :label="__('Email was already subscribed')" placeholder="https://"
                        name="redirect_after_already_subscribed" :value="$emailList->redirect_after_already_subscribed"
                        type="text"/>
            <x-mailcoach::text-field :label="__('Someone unsubscribed')" placeholder="https://" name="redirect_after_unsubscribed"
                        :value="$emailList->redirect_after_unsubscribed" type="text"/>
         </x-mailcoach::fieldset>

        <div data-conditional-confirmation="true">
            <x-mailcoach::fieldset :legend="__('Confirmation mail')">
                @if(empty($emailList->confirmation_mailable_class))
                    <div class="radio-group">
                        <x-mailcoach::radio-field
                            name="confirmation_mail"
                            option-value="send_default_confirmation_mail"
                            :value="! $emailList->hasCustomizedConfirmationMailFields()"
                            :label="__('Send default confirmation mail')"
                            data-conditional="confirmation-mail"
                        />
                        <x-mailcoach::radio-field
                            name="confirmation_mail"
                            option-value="send_custom_confirmation_mail"
                            :value="$emailList->hasCustomizedConfirmationMailFields()"
                            :label="__('Send customized confirmation mail')"
                            data-conditional="confirmation-mail"
                        />
                    </div>

                    <div class="form-grid" data-conditional-confirmation-mail="send_custom_confirmation_mail">
                        <x-mailcoach::text-field :label="__('Subject')" name="confirmation_mail_subject"
                                    :value="$emailList->confirmation_mail_subject" type="text"/>

                        <div class="form-field max-w-full">
                            <label class="label label-required" for="html">{{ __('Body (HTML)') }}</label>
                            <textarea class="input input-html" rows="20" id="html"
                                    name="confirmation_mail_content">{{ old('confirmation_mail_content', $emailList->confirmation_mail_content) }}</textarea>
                            @error('confirmation_mail_content')
                            <p class="form-error">{{ $message }}</p>
                            @enderror

                            <div class="mt-12 markup-code alert alert-info text-sm">
                                {{ __('You can use following placeholders in the subject and body of the confirmation mail:') }}
                                <ul class="grid mt-2 gap-2">
                                    <li><code class="mr-2">::confirmUrl::</code>{{ __('The URL where the subscription can be confirmed') }}</li>
                                    <li><code class="mr-2">::subscriber.first_name::</code>{{ __('The first name of the subscriber') }}</li>
                                    <li><code class="mr-2">::list.name::</code>{{ __('The name of this list') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <x-mailcoach::help>
                        {{ __('A custom mailable (:mailable) will be used.', ['mailable' => $emailList->confirmation_mailable_class]) }}
                    </x-mailcoach::help>
                @endif
            </x-mailcoach::fieldset>
        </div>

        <x-mailcoach::fieldset :legend="__('Welcome Mail')">

            @if(empty($emailList->welcome_mailable_class))
                <div class="radio-group">
                    <x-mailcoach::radio-field
                        name="welcome_mail"
                        option-value="do_not_send_welcome_mail"
                        :value="! $emailList->send_welcome_mail"
                        :label="__('Do not send a welcome mail')"
                        data-conditional="welcome-mail"
                    />
                    <x-mailcoach::radio-field
                        name="welcome_mail"
                        option-value="send_default_welcome_mail"
                        :value="($emailList->send_welcome_mail) && (! $emailList->hasCustomizedWelcomeMailFields())"
                        :label="__('Send default welcome mail')"
                        data-conditional="welcome-mail"
                    />
                    <x-mailcoach::radio-field
                        name="welcome_mail"
                        option-value="send_custom_welcome_mail"
                        :value="$emailList->send_welcome_mail && $emailList->hasCustomizedWelcomeMailFields()"
                        :label="__('Send customized welcome mail')"
                        data-conditional="welcome-mail"
                    />
                </div>

                <div class="form-grid" data-conditional-unless-welcome-mail="do_not_send_welcome_mail">
                    <x-mailcoach::text-field :label="__('Delay sending welcome mail in minutes')"
                                :value="$emailList->welcome_mail_delay_in_minutes"
                                name="welcome_mail_delay_in_minutes"
                                placeholder="Delay in minutes"/>
                </div>

                <div class="form-grid" data-conditional-welcome-mail="send_custom_welcome_mail">
                    <x-mailcoach::text-field :label="__('Subject')" name="welcome_mail_subject"
                                :value="$emailList->welcome_mail_subject" type="text"/>

                    <div class="form-field max-w-full">
                        <label class="label label-required" for="html">{{ __('Body (HTML)') }}</label>
                        <textarea class="input input-html" rows="20" id="html"
                                name="welcome_mail_content">{{ old('welcome_mail_content', $emailList->welcome_mail_content) }}</textarea>
                        @error('welcome_mail_content')
                        <p class="form-error">{{ $message }}</p>
                        @enderror

                        <div class="mt-12 markup-code alert alert-info text-sm">
                            {{ __('You can use following placeholders in the subject and body of the welcome mail:') }}
                            <ul class="grid mt-2 gap-2">
                                <li><code class="mr-2">::unsubscribeUrl::</code>{{ __('The URL where users can unsubscribe') }}</li>
                                <li><code class="mr-2">::subscriber.first_name::</code>{{ __('The first name of the subscriber') }}</li>
                                <li><code class="mr-2">::subscriber.email::</code>{{ __('The email of the subscriber') }}</li>
                                <li><code class="mr-2">::list.name::</code>{{ __('The name of this list') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <x-mailcoach::help>
                    {{ __('A custom mailable (:mailable) will be used.', ['mailable' => $emailList->welcome_mailable_class]) }}
                </x-mailcoach::help>
            @endif
        </x-mailcoach::fieldset>


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
            <x-mailcoach::button :label="__('Save list settings')"/>
        </div>
    </form>
</x-mailcoach::layout-list>

