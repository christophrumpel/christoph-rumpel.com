<x-mailcoach::layout-main :title="__('Debug')">

@php($issueBody = "## Describe your issue\n\n\n\n---\n## Health check:\n\n")
<div class="form-grid">
    <x-mailcoach::fieldset :legend="__('Health')">
        <dl class="dl markup-links">
            @php($issueBody.='**Environment**: ' . app()->environment() . "\n")
            <dt>
                <x-mailcoach::health-label :test="!app()->environment('local')" warning="true" :label="__('Environment')" />  
            </dt>
            <dd>
                <div>
                    {{ app()->environment() }}
                </div>
            </dd>

            @php($issueBody.='**Debug**: ' . (config('app.debug') ? 'ON' : 'OFF') . "\n")
            <dt>
                <x-mailcoach::health-label :test="!config('app.debug')" warning="true" :label="__('Debug')" />
            </dt>
            <dd>
                {{ config('app.debug') ? 'ON' : 'OFF' }}
            </dd>

            @php($issueBody.='**Horizon**: ' . ($horizonStatus->is(\Spatie\Mailcoach\Domain\Shared\Support\HorizonStatus::STATUS_ACTIVE) ? 'Active' : 'Inactive') . "\n")
            <dt>
                <x-mailcoach::health-label :test="$horizonStatus->is(\Spatie\Mailcoach\Domain\Shared\Support\HorizonStatus::STATUS_ACTIVE)" :label="__('Horizon')" />
            </dt>
            <dd>
                <p>
                @if($horizonStatus->is(\Spatie\Mailcoach\Domain\Shared\Support\HorizonStatus::STATUS_ACTIVE))
                    {{ __('Active') }}
                @else
                    {!! __('Horizon is inactive. <a target="_blank" href=":docsLink">Read the docs</a>.', ['docsLink' => 'https://spatie.be/docs/laravel-mailcoach']) !!}
                @endif
                </p>
            </dd>

            @php($issueBody.='**Queue** connection: ' . ($hasQueueConnection ? 'OK' : 'Not OK') . "\n")
            <dt>
                <x-mailcoach::health-label :test="$hasQueueConnection"  :label="__('Queue connection')" />
            </dt>
            <dd>
                <p>
                    @if($hasQueueConnection)
                    {!! __('Queue connection settings for <code>mailcoach-redis</code> exist.') !!}
                    @else
                        {!! __('No valid <strong>queue connection</strong> found. Configure a queue connection with the <strong>mailcoach-redis</strong> key. <a target="_blank" href=":docsLink">Read the docs</a>.', ['docsLink' => 'https://spatie.be/docs/laravel-mailcoach']) !!}
                    @endif
                </p>
            </dd>

            @php($issueBody.='**Webhooks**: ' . $webhookTableCount . " unprocessed webhooks\n")
            <dt>
                <x-mailcoach::health-label :test="$webhookTableCount === 0"  :label="__('Webhooks')" />
            </dt>
            <dd>
                @if($webhookTableCount === 0)
                    {{ __('All webhooks are processed.') }} 
                @else
                    {{ __(':count unprocessed webhooks.', ['count' => $webhookTableCount ]) }}
                @endif
            </dd>

            <dt>
                @if ($lastScheduleRun && now()->diffInMinutes($lastScheduleRun) < 10)
                    @php($issueBody.='**Schedule**: ran ' . now()->diffInMinutes($lastScheduleRun) . " minute(s) ago\n")
                    <x-mailcoach::health-label :test="true"  :label="__('Schedule')" />
                @elseif ($lastScheduleRun)
                    @php($issueBody.='**Schedule**: ran ' . now()->diffInMinutes($lastScheduleRun) . " minute(s) ago\n")
                    <x-mailcoach::health-label :test="false" warning="true" :label="__('Schedule')" />
                @else
                    @php($issueBody.="**Schedule**: hasn't run\n")
                    <x-mailcoach::health-label :test="false" :label="__('Schedule')" />
                @endif
            </dt>
            <dd>
                @if ($lastScheduleRun)
                    {{ __('Ran :lastRun minute(s) ago.', ['lastRun' => now()->diffInMinutes($lastScheduleRun) ]) }}
                @else
                     {{ __('Schedule hasn\'t run.') }}
                @endif
            </dd>
        </dl>
    </x-mailcoach::fieldset>

    <x-mailcoach::fieldset :legend="__('Mailers')">
        <dl class="dl">
            @php($issueBody.="**Default mailer**: " . config('mail.default') . "\n")
            <dt>
                <x-mailcoach::health-label :test="!in_array(config('mail.default'), ['log', 'array', null])" warning="true" :label="__('Default mailer')" />
            </dt>
            <dd>
                <code>{{ config('mail.default') }}</code>
            </dd>

            @php($issueBody.="**Mailcoach mailer**: " . (config('mailcoach.mailer') ?? 'null') . "\n")
            <dt>
                <x-mailcoach::health-label :test="!in_array(config('mailcoach.mailer'), ['log', 'array'])" warning="true" :label="__('Mailcoach mailer')" />
            </dt>
            <dd>
                <code>{{ config('mailcoach.mailer') ?? 'null' }}</code>
            </dd>

            @php($issueBody.="**Campaign mailer**: " . (config('mailcoach.campaigns.mailer') ?? 'null') . "\n")
            <dt>
                <x-mailcoach::health-label :test="!in_array(config('mailcoach.campaigns.mailer'), ['log', 'array'])" warning="true" :label="__('Campaign mailer')" />
            </dt>
            <dd>
                <code>{{ config('mailcoach.campaigns.mailer') ?? 'null' }}</code>
            </dd>

            @php($issueBody.="**Transactional mailer**: " . (config('mailcoach.transactional.mailer') ?? 'null') . "\n")
            <dt>
                <x-mailcoach::health-label :test="!in_array(config('mailcoach.transactional.mailer'), ['log', 'array'])" warning="true" :label="__('Transactional mailer')" />
            </dt>
            <dd>
                <code>{{ config('mailcoach.transactional.mailer') ?? 'null' }}</code>
            </dd>
        </dl>
    </x-mailcoach::fieldset>
    <x-mailcoach::fieldset :legend="__('Technical Details')">
        @php($issueBody.="\n\n## Technical details\n\n")
        <dl class="dl">
                @php($issueBody.="**App directory**: " . base_path() . "\n")
                <dt>App directory</dt>
                <dd>
                    <code>{{ base_path() }}</code>
                </dd>
           
                @php($issueBody.="**User agent**: " . $_SERVER['HTTP_USER_AGENT'] . "\n")
                <dt>User agent</dt>
                <dd>
                    <code>{{ $_SERVER['HTTP_USER_AGENT'] }}</code>
                </dd>
           
                @php($issueBody.="**PHP version**: " . PHP_VERSION . "\n")
                <dt>PHP</dt>
                <dd>
                    <code>{{ PHP_VERSION }}</code>
                </dd>
            
                @php($issueBody.="**" . config('database.default') . " version**: " . $mysqlVersion . "\n")
                <dt>{{ config('database.default') }}</dt>
                <dd>
                    <code>{{ $mysqlVersion }}</code>
                </dd>
           
                @php($issueBody.="**Laravel version**: " . app()->version() . "\n")
                <dt>Laravel</dt>
                <dd>
                    <code>{{ app()->version() }}</code>
                </dd>
           
                @php($issueBody.="**Horizon version**: " . $horizonVersion . "\n")
                <dt>Horizon</dt>
                <dd>
                    <code>{{ $horizonVersion }}</code>
                </dd>
         
                @php($issueBody.="**laravel-mailcoach version**: " . $versionInfo->getCurrentVersion('laravel-mailcoach') . "\n")
                <dt>laravel-mailcoach</dt>
                <dd>
                    <div class="flex items-center space-x-2">
                        <code>{{ $versionInfo->getCurrentVersion('laravel-mailcoach') }}</code>
                        @if(! $versionInfo->isLatest('laravel-mailcoach'))
                            <span class="font-sans text-xs inline-flex items-center bg-gray-200 bg-opacity-50 text-gray-600 rounded-sm px-1 leading-relaxed">
                                <i class="far fa-horse-head opacity-75 mr-1"></i>
                                {{ __('Upgrade available') }}
                            </span>
                        @endif
                    </div>
                </dd>

            @if (class_exists(\Spatie\MailcoachUi\MailcoachUiServiceProvider::class))
                @php($issueBody.="**mailcoach-ui version**: " . $versionInfo->getCurrentVersion('mailcoach-ui') . "\n")
                <dt>mailcoach-ui</dt>
                <dd>
                    <div class="flex items-center space-x-2">
                        <code>{{ $versionInfo->getCurrentVersion('mailcoach-ui') }}</code>
                        @if(! $versionInfo->isLatest('mailcoach-ui'))
                            <span class="font-sans text-xs inline-flex items-center bg-gray-200 bg-opacity-50 text-gray-600 rounded-sm px-1 leading-relaxed">
                                <i class="far fa-horse-head opacity-75 mr-1"></i>
                                {{ __('Upgrade available') }}
                            </span>
                        @endif
                    </div>
                </dd>
            @endif

    </x-mailcoach::fieldset>
    <x-mailcoach::fieldset  :legend="__('Having trouble?')">
        <a href="https://github.com/spatie/laravel-mailcoach/issues/new?body={{ urlencode($issueBody) }}" target="_blank">
            <x-mailcoach::button :label="__('Create a support issue')"/>
        </a>
    </x-mailcoach::fieldset>
</div>
</x-mailcoach::layout-main>
