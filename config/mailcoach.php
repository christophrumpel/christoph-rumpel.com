<?php

return [
    'campaigns' => [
        /*
         * The default mailer used by Mailcoach for sending campaigns.
         */
        'mailer' => null,

        /*
         * Replacers are classes that can make replacements in the html of a campaign.
         *
         * You can use a replacer to create placeholders.
         */
        'replacers' => [
            \Spatie\Mailcoach\Domain\Campaign\Support\Replacers\WebviewCampaignReplacer::class,
            \Spatie\Mailcoach\Domain\Campaign\Support\Replacers\SubscriberReplacer::class,
            \Spatie\Mailcoach\Domain\Campaign\Support\Replacers\EmailListCampaignReplacer::class,
            \Spatie\Mailcoach\Domain\Campaign\Support\Replacers\UnsubscribeUrlReplacer::class,
            \Spatie\Mailcoach\Domain\Campaign\Support\Replacers\CampaignNameCampaignReplacer::class,
        ],

        /*
         * Here you can configure which campaign template editor Mailcoach uses.
         * By default this is a text editor that highlights HTML.
         */
        'editor' => \Spatie\Mailcoach\Domain\Shared\Support\Editor\TextEditor::class,

        /*
         * Here you can specify which jobs should run on which queues.
         * Use an empty string to use the default queue.
         */
        'perform_on_queue' => [
            'send_campaign_job' => 'send-campaign',
            'send_mail_job' => 'send-mail',
            'send_test_mail_job' => 'mailcoach',
            'send_welcome_mail_job' => 'mailcoach',
            'process_feedback_job' => 'mailcoach-feedback',
            'import_subscribers_job' => 'mailcoach',
        ],

        /*
         * By default only 10 mails per second will be sent to avoid overwhelming your
         * e-mail sending service.
         */
        'throttling' => [
            'allowed_number_of_jobs_in_timespan' => 10,
            'timespan_in_seconds' => 1,

            /*
             * Throttling relies on the cache. Here you can specify the store to be used.
             *
             * When passing `null`, we'll use the default store.
             */
            'cache_store' => null,
        ],

        /*
         * The job that will send a campaign could take a long time when your list contains a lot of subscribers.
         * Here you can define the maximum run time of the job. If the job hasn't fully sent your campaign, it
         * will redispatch itself.
         */
        'send_campaign_maximum_job_runtime_in_seconds' => 60  * 10,

        /*
         * You can customize some of the behavior of this package by using our own custom action.
         * Your custom action should always extend the one of the default ones.
         */
        'actions' => [
            'prepare_email_html' => \Spatie\Mailcoach\Domain\Campaign\Actions\PrepareEmailHtmlAction::class,
            'prepare_subject' => \Spatie\Mailcoach\Domain\Campaign\Actions\PrepareSubjectAction::class,
            'prepare_webview_html' => \Spatie\Mailcoach\Domain\Campaign\Actions\PrepareWebviewHtmlAction::class,
            'convert_html_to_text' => \Spatie\Mailcoach\Domain\Campaign\Actions\ConvertHtmlToTextAction::class,
            'personalize_html' => \Spatie\Mailcoach\Domain\Campaign\Actions\PersonalizeHtmlAction::class,
            'personalize_subject' => \Spatie\Mailcoach\Domain\Campaign\Actions\PersonalizeSubjectAction::class,
            'retry_sending_failed_sends' => \Spatie\Mailcoach\Domain\Campaign\Actions\RetrySendingFailedSendsAction::class,
            'send_campaign' => \Spatie\Mailcoach\Domain\Campaign\Actions\SendCampaignAction::class,
            'send_mail' => \Spatie\Mailcoach\Domain\Campaign\Actions\SendMailAction::class,
            'send_test_mail' => \Spatie\Mailcoach\Domain\Campaign\Actions\SendCampaignTestAction::class,
        ],

        /*
         * Adapt these settings if you prefer other default settings for newly created campaigns
         */
        'default_settings' => [
            'track_opens' => false,
            'track_clicks' => false,
            'utm_tags' => true,
        ],

        /**
         * Here you can configure which fields of the campaigns you want to search in
         * from the Campaigns section in the view. The value is an array of fields.
         * For relations fields, you can use the dot notation (e.g. 'emailList.name').
         */
        'search_fields' => ['name'],
    ],

    'automation' => [
        /*
         * The default mailer used by Mailcoach for automation mails.
         */
        'mailer' => null,

        /*
         * By default only 10 mails per second will be sent to avoid overwhelming your
         * e-mail sending service.
         */
        'throttling' => [
            'allowed_number_of_jobs_in_timespan' => 10,
            'timespan_in_seconds' => 1,

            /*
             * Throttling relies on the cache. Here you can specify the store to be used.
             *
             * When passing `null`, we'll use the default store.
             */
            'cache_store' => null,
        ],

        /*
         * The job that will send automation mails could take a long time when your list contains a lot of subscribers.
         * Here you can define the maximum run time of the job. If the job hasn't fully sent your automation mails, it
         * will redispatch itself.
         */
        'send_automation_mails_maximum_job_runtime_in_seconds' => 60  * 10,

        /*
         * Here you can configure which automation mail template editor Mailcoach uses.
         * By default this is a text editor that highlights HTML.
         */
        'editor' => \Spatie\Mailcoach\Domain\Shared\Support\Editor\TextEditor::class,

        'actions' => [
            'send_mail' => \Spatie\Mailcoach\Domain\Automation\Actions\SendMailAction::class,
            'send_automation_mail_to_subscriber' => \Spatie\Mailcoach\Domain\Automation\Actions\SendAutomationMailToSubscriberAction::class,
            'send_automation_mails_action' => \Spatie\Mailcoach\Domain\Automation\Actions\SendAutomationMailsAction::class,
            'prepare_subject' => \Spatie\Mailcoach\Domain\Automation\Actions\PrepareSubjectAction::class,
            'prepare_webview_html' => \Spatie\Mailcoach\Domain\Automation\Actions\PrepareWebviewHtmlAction::class,

            'convert_html_to_text' => \Spatie\Mailcoach\Domain\Automation\Actions\ConvertHtmlToTextAction::class,
            'prepare_email_html' => \Spatie\Mailcoach\Domain\Automation\Actions\PrepareEmailHtmlAction::class,
            'personalize_html' => \Spatie\Mailcoach\Domain\Automation\Actions\PersonalizeHtmlAction::class,
            'personalize_subject' => \Spatie\Mailcoach\Domain\Automation\Actions\PersonalizeSubjectAction::class,
            'send_test_mail' => \Spatie\Mailcoach\Domain\Automation\Actions\SendAutomationMailTestAction::class,

            'should_run_for_subscriber' => \Spatie\Mailcoach\Domain\Automation\Actions\ShouldAutomationRunForSubscriberAction::class,
        ],

        'replacers' => [
            \Spatie\Mailcoach\Domain\Automation\Support\Replacers\WebviewAutomationMailReplacer::class,
            \Spatie\Mailcoach\Domain\Automation\Support\Replacers\SubscriberReplacer::class,
            \Spatie\Mailcoach\Domain\Automation\Support\Replacers\UnsubscribeUrlReplacer::class,
            \Spatie\Mailcoach\Domain\Automation\Support\Replacers\AutomationMailNameAutomationMailReplacer::class,
        ],

        'flows' => [
            /**
             * The available actions in the automation flows. You can add custom
             * actions to this array, make sure they extend
             * \Spatie\Mailcoach\Domain\Automation\Support\Actions\AutomationAction
             */
            'actions' => [
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\AddTagsAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\SendAutomationMailAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\ConditionAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\SplitAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\RemoveTagsAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\WaitAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\HaltAction::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Actions\UnsubscribeAction::class,
            ],

            /**
             * The available triggers in the automation settings. You can add
             * custom triggers to this array, make sure they extend
             * \Spatie\Mailcoach\Domain\Automation\Support\Triggers\AutomationTrigger
             */
            'triggers' => [
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\NoTrigger::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\SubscribedTrigger::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\DateTrigger::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\TagAddedTrigger::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\TagRemovedTrigger::class,
                \Spatie\Mailcoach\Domain\Automation\Support\Triggers\WebhookTrigger::class,
            ],

            /**
             * Custom conditions for the ConditionAction, these have to implement the
             * \Spatie\Mailcoach\Domain\Automation\Support\Conditions\Condition
             * interface.
             */
            'conditions' => []
        ],

        'perform_on_queue' => [
            'dispatch_pending_automation_mails_job' => 'send-campaign',
            'run_automation_action_job' => 'send-campaign',
            'run_action_for_subscriber_job' => 'mailcoach',
            'run_automation_for_subscriber_job' => 'mailcoach',
            'send_automation_mail_to_subscriber_job' => 'send-automation-mail',
            'send_automation_mail_job' => 'send-mail',
            'send_test_mail_job' => 'mailcoach',
        ],

        /*
         * Adapt these settings if you prefer other default settings for newly created campaigns
         */
        'default_settings' => [
            'track_opens' => false,
            'track_clicks' => false,
            'utm_tags' => true,
        ],
    ],

    'audience' => [
        'actions' => [
            'confirm_subscriber' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\ConfirmSubscriberAction::class,
            'create_subscriber' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\CreateSubscriberAction::class,
            'delete_subscriber' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\DeleteSubscriberAction::class,
            'import_subscribers' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\ImportSubscribersAction::class,
            'send_confirm_subscriber_mail' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\SendConfirmSubscriberMailAction::class,
            'send_welcome_mail' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\SendWelcomeMailAction::class,
            'update_subscriber' => \Spatie\Mailcoach\Domain\Audience\Actions\Subscribers\UpdateSubscriberAction::class,
        ],

        /*
         * This disk will be used to store files regarding importing subscribers.
         */
        'import_subscribers_disk' => 'local',
    ],

    'transactional' => [
        /*
         * The default mailer used by Mailcoach for transactional mails.
         */
        'mailer' => null,

        /*
         * Replacers are classes that can make replacements in the body of transactional mails.
         *
         * You can use replacers to create placeholders.
         */
        'replacers' => [
            'subject' => \Spatie\Mailcoach\Domain\TransactionalMail\Support\Replacers\SubjectReplacer::class,
        ],

        'actions' => [
            'send_test' => \Spatie\Mailcoach\Domain\TransactionalMail\Actions\SendTestForTransactionalMailTemplateAction::class,
            'render_template' => \Spatie\Mailcoach\Domain\TransactionalMail\Actions\RenderTemplateAction::class,
        ],

        /**
         * Here you can configure which transactional mail template editor Mailcoach uses.
         * By default this is a text editor that highlights HTML.
         */
        'editor' => \Spatie\Mailcoach\Domain\Shared\Support\Editor\TextEditor::class,

        /**
         * Here you can configure which fields of the transactional mails you want to search in
         * from the Transactional Log section in the view. The value is an array of fields.
         * For relations fields, you can use the dot notation.
         */
        'search_fields' => ['subject'],
    ],

    'shared' => [
        /*
         * Here you can specify which jobs should run on which queues.
         * Use an empty string to use the default queue.
         */
        'perform_on_queue' => [
            'calculate_statistics_job' => 'mailcoach',
        ],

        'actions' => [
            'calculate_statistics' => \Spatie\Mailcoach\Domain\Shared\Actions\CalculateStatisticsAction::class,
        ],
    ],

    /*
     * This disk will be used to store files regarding importing.
     */
    'import_disk' => 'local',

    /*
     * This disk will be used to store files regarding exporting.
     */
    'export_disk' => 'local',

    /*
     * This disk will be used to store files temporarily for
     * unzipping & reading. Make sure this is on a local
     * filesystem.
     */
    'tmp_disk' => 'local',

    /*
     * The mailer used by Mailcoach for password resets and summary emails.
     * Mailcoach will use the default Laravel mailer if this is not set.
     */
    'mailer' => null,

    /*
     * The timezone to use with Mailcoach, by default the timezone in
     * config/app.php will be used.
     */
    'timezone' => null,

    /*
     * The date format used on all screens of the UI
     */
    'date_format' => 'Y-m-d H:i',

    /*
     * Here you can specify on which connection Mailcoach's jobs will be dispatched.
     * Leave empty to use the app default's env('QUEUE_CONNECTION')
     */
    'queue_connection' => '',


    /*
     * Unauthorized users will get redirected to this route.
     */
    'redirect_unauthorized_users_to_route' => 'login',

    /*
     *  This configuration option defines the authentication guard that will
     *  be used to protect your the Mailcoach UI. This option should match one
     *  of the authentication guards defined in the "auth" config file.
     */
    'guard' => env('MAILCOACH_GUARD', null),

    /*
     *  These middleware will be assigned to every Mailcoach routes, giving you the chance
     *  to add your own middleware to this stack or override any of the existing middleware.
     */
    'middleware' => [
        'web' => [
            'web',
            Spatie\Mailcoach\Http\App\Middleware\Authenticate::class,
            Spatie\Mailcoach\Http\App\Middleware\Authorize::class,
            Spatie\Mailcoach\Http\App\Middleware\SetMailcoachDefaults::class,
        ],
        'api' => [
            'api',
            'auth:api',
        ],
    ],


    'models' => [
        /*
         * The model you want to use as a Campaign model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\Campaign::class`
         * model.
         */
        'campaign' => Spatie\Mailcoach\Domain\Campaign\Models\Campaign::class,

        /*
         * The model you want to use as a CampaignLink model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\CampaignLink::class`
         * model.
         */
        'campaign_link' => \Spatie\Mailcoach\Domain\Campaign\Models\CampaignLink::class,

        /*
         * The model you want to use as a CampaignClick model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\CampaignClick::class`
         * model.
         */
        'campaign_click' => \Spatie\Mailcoach\Domain\Campaign\Models\CampaignClick::class,

        /*
         * The model you want to use as a CampaignOpen model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\CampaignOpen::class`
         * model.
         */
        'campaign_open' => \Spatie\Mailcoach\Domain\Campaign\Models\CampaignOpen::class,

        /*
         * The model you want to use as a CampaignUnsubscribe model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\CampaignUnsubscribe::class`
         * model.
         */
        'campaign_unsubscribe' => \Spatie\Mailcoach\Domain\Campaign\Models\CampaignUnsubscribe::class,

        /*
         * The model you want to use as a EmailList model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Audience\Models\EmailList::class`
         * model.
         */
        'email_list' => \Spatie\Mailcoach\Domain\Audience\Models\EmailList::class,

        /*
         * The model you want to use as a Send model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Shared\Models\Send::class`
         * model.
         */
        'send' => \Spatie\Mailcoach\Domain\Shared\Models\Send::class,

        /*
         * The model you want to use as a SendFeedbackItem model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Shared\Models\SendFeedbackItem::class`
         * model.
         */
        'send_feedback_item' => \Spatie\Mailcoach\Domain\Shared\Models\SendFeedbackItem::class,

        /*
         * The model you want to use as a Subscriber model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Audience\Models\Subscriber::class`
         * model.
         */
        'subscriber' => \Spatie\Mailcoach\Domain\Audience\Models\Subscriber::class,

        /*
         * The model you want to use as a SubscriberImport model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Audience\Models\SubscriberImport::class`
         * model.
         */
        'subscriber_import' => \Spatie\Mailcoach\Domain\Audience\Models\SubscriberImport::class,

        /*
         * The model you want to use as a Tag model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Audience\Models\Tag::class`
         * model.
         */
        'tag' => Spatie\Mailcoach\Domain\Audience\Models\Tag::class,

        /*
         * The model you want to use as a TagSegment model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Audience\Models\TagSegment::class`
         * model.
         */
        'tag_segment' => Spatie\Mailcoach\Domain\Audience\Models\TagSegment::class,

        /*
         * The model you want to use as a Template model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Campaign\Models\Template::class`
         * model.
         */
        'template' => Spatie\Mailcoach\Domain\Campaign\Models\Template::class,

        /*
         * The model you want to use as a TransactionalMail model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMail::class`
         * model.
         */
        'transactional_mail' => \Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMail::class,

        /*
         * The model you want to use as a TransactionalMailOpen model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailOpen::class`
         * model.
         */
        'transactional_mail_open' => \Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailOpen::class,

        /*
         * The model you want to use as a TransactionalMailClick model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailClick::class`
         * model.
         */
        'transactional_mail_click' => \Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailClick::class,

        /*
         * The model you want to use as a TransactionalMailTemplate model. It needs to be or
         * extend the `\Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailTemplate::class`
         * model.
         */
        'transactional_mail_template' => \Spatie\Mailcoach\Domain\TransactionalMail\Models\TransactionalMailTemplate::class,

        /*
         * The model you want to use as an Automation model. It needs to be or
         * extend the `\Spatie\Mailcoach\Domain\Automation\Models\Automation::class`
         * model.
         */
        'automation' => \Spatie\Mailcoach\Domain\Automation\Models\Automation::class,

        /*
         * The model you want to use as an Action model. It needs to be or
         * extend the `\Spatie\Mailcoach\Domain\Automation\Models\Action::class`
         * model.
         */
        'automation_action' => \Spatie\Mailcoach\Domain\Automation\Models\Action::class,

        /*
         * The model you want to use as a Trigger model. It needs to be or
         * extend the `\Spatie\Mailcoach\Domain\Automation\Models\Trigger::class`
         * model.
         */
        'automation_trigger' => \Spatie\Mailcoach\Domain\Automation\Models\Trigger::class,

        /*
         * The model you want to use as an Automation mail model. It needs to be or
         * extend the `\Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::class` model.
         */
        'automation_mail' => \Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::class,

        /*
         * The model you want to use as a Campaign model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Automation\Models\AutomationMailLink::class`
         * model.
         */
        'automation_mail_link' => \Spatie\Mailcoach\Domain\Automation\Models\AutomationMailLink::class,

        /*
         * The model you want to use as a Campaign model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Automation\Models\AutomationMailClick::class`
         * model.
         */
        'automation_mail_click' => \Spatie\Mailcoach\Domain\Automation\Models\AutomationMailClick::class,

        /*
         * The model you want to use as a Campaign model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Automation\Models\AutomationMailOpen::class`
         * model.
         */
        'automation_mail_open' => \Spatie\Mailcoach\Domain\Automation\Models\AutomationMailOpen::class,

        /*
         * The model you want to use as a Campaign model. It needs to be or
         * extend the `Spatie\Mailcoach\Domain\Automation\Models\AutomationMailUnsubscribe::class`
         * model.
         */
        'automation_mail_unsubscribe' => \Spatie\Mailcoach\Domain\Automation\Models\AutomationMailUnsubscribe::class,

        /*
         * The model you want to use as the pivot between an Automation Action model
         * and the Subscriber model. It needs to be or extend the
         * `\Spatie\Mailcoach\Domain\Automation\Models\ActionSubscriber::class` model.
         */
        'action_subscriber' => \Spatie\Mailcoach\Domain\Automation\Models\ActionSubscriber::class,
    ],

    'views' => [
        /*
         * The service provider registers several Blade components that are
         * used in Mailcoach's views. If you are using the default Mailcoach
         * views, leave this as true so they work as expected. If you have
         * your own views and don't need/want Mailcoach to register these
         * blade components (e.g., because of naming conflicts), you can
         * change this setting to false and they won't be registered.
         *
         * If you change this setting, be sure to run `php artisan view:clear`
         * so Laravel can recompile your views.
         */
        'use_blade_components' => true,
    ],
];
