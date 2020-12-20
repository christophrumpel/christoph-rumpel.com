@extends('mailcoach::app.layouts.app', ['title' => __('Debug')])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <span class="breadcrumb">{{ __('Debug') }}</span>
            </li>
        </ul>
    </nav>
@endsection

@section('content')
@php($issueBody = "## Describe your issue\n\n\n\n---\n## Health check:\n\n")
<section class="card">
    <table>
        <tbody>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold text-lg" colspan="2">Health</td>
                @php($issueBody.='**Environment**: ' . app()->environment() . "\n")
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Environment</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if (app()->environment('local'))
                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i> {{ app()->environment() }}
                    @else
                        <i class="fas fa-check text-green-800 mr-1"></i> {{ app()->environment() }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Debug</td>
                @php($issueBody.='**Debug**: ' . (config('app.debug') ? 'ON' : 'OFF') . "\n")
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if (config('app.debug'))
                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i> ON
                    @else
                        <i class="fas fa-check text-green-800 mr-1"></i> OFF
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Horizon running</td>
                @php($issueBody.='**Horizon**: ' . ($horizonStatus->is(\Spatie\Mailcoach\Support\HorizonStatus::STATUS_ACTIVE) ? 'Active' : 'Inactive') . "\n")
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if($horizonStatus->is(\Spatie\Mailcoach\Support\HorizonStatus::STATUS_ACTIVE))
                        <i class="fas fa-check text-green-800 mr-1"></i>
                    @else
                        <i class="fas fa-check text-red-800 mr-1"></i>
                        {!! __('<strong>Horizon</strong> is not active on your server. <a class="text-blue-800" target="_blank" href=":docsLink">Read the docs</a>.', ['docsLink' => 'https://mailcoach.app/docs']) !!}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Queue connection</td>
                @php($issueBody.='**Queue** connection: ' . ($hasQueueConnection ? 'OK' : 'Not OK') . "\n")
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if($hasQueueConnection)
                        <i class="fas fa-check text-green-800 mr-1"></i> Queue connection settings for <code>mailcoach-redis</code> exist.
                    @else
                        <i class="fas fa-times-circle text-red-800 mr-1"></i>
                        {!! __('No valid <strong>queue connection</strong> found. Configure a queue connection with the <strong>mailcoach-redis</strong> key. <a class="text-blue-800" target="_blank" href=":docsLink">Read the docs</a>.', ['docsLink' => 'https://mailcoach.app/docs']) !!}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Webhooks</td>
                @php($issueBody.='**Webhooks**: ' . $webhookTableCount . " unprocessed webhooks\n")
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if($webhookTableCount === 0)
                        <i class="fas fa-check-circle text-green-800 mr-1"></i> No unprocessed webhooks
                    @else
                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                        {{ $webhookTableCount }} unprocessed webhooks
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Schedule</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    @if ($lastScheduleRun && now()->diffInMinutes($lastScheduleRun) < 10)
                        @php($issueBody.='**Schedule**: ran ' . now()->diffInMinutes($lastScheduleRun) . " minute(s) ago\n")
                        <i class="fas fa-check-circle text-green-800 mr-1"></i>
                        Ran {{ now()->diffInMinutes($lastScheduleRun) }} minute(s) ago
                    @elseif ($lastScheduleRun)
                        @php($issueBody.='**Schedule**: ran ' . now()->diffInMinutes($lastScheduleRun) . " minute(s) ago\n")
                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                        Ran {{ now()->diffInMinutes($lastScheduleRun) }} minute(s) ago
                    @else
                        @php($issueBody.="**Schedule**: hasn't run\n")
                        <i class="fas fa-times-circle text-red-800 mr-1"></i>
                        Schedule hasn't run
                    @endif
                </td>
            </tr>
            <tr>
                <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold align-top">Mail config</td>
                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                    <table>
                        <tbody>
                            <tr>
                                <td class="pr-2">Default mailer:</td>
                                @php($issueBody.="**Default mailer**: " . config('mail.default') . "\n")
                                <td>
                                    <span class="font-mono">{{ config('mail.default') }}</span>
                                    @if (in_array(config('mail.default'), ['log', 'array', null]))
                                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-2">Mailcoach mailer:</td>
                                @php($issueBody.="**Mailcoach mailer**: " . (config('mailcoach.mailer') ?? 'null') . "\n")
                                <td>
                                    <span class="font-mono">{{ config('mailcoach.mailer') ?? 'null' }}</span>
                                    @if (in_array(config('mailcoach.mailer'), ['log', 'array']))
                                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-2">Campaign mailer:</td>
                                @php($issueBody.="**Campaign mailer**: " . (config('mailcoach.campaign_mailer') ?? 'null') . "\n")
                                <td>
                                    <span class="font-mono">{{ config('mailcoach.campaign_mailer') ?? 'null' }}</span>
                                    @if (in_array(config('mailcoach.campaign_mailer'), ['log', 'array']))
                                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-2">Transactional mailer:</td>
                                @php($issueBody.="**Transactional mailer**: " . (config('mailcoach.transactional_mailer') ?? 'null') . "\n")
                                <td>
                                    <span class="font-mono">{{ config('mailcoach.transactional_mailer') ?? 'null' }}</span>
                                    @if (in_array(config('mailcoach.transactional_mailer'), ['log', 'array']))
                                        <i class="fas fa-exclamation-triangle text-orange-800 mr-1"></i>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</section>
<section class="card mt-4">
    <table>
        <tbody>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold text-lg" colspan="2">Details</td>
            @php($issueBody.="\n\n## Technical details\n\n")
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">App directory</td>
            @php($issueBody.="**App directory**: " . base_path() . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                {{ base_path() }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">User agent</td>
            @php($issueBody.="**User agent**: " . $_SERVER['HTTP_USER_AGENT'] . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                {{ $_SERVER['HTTP_USER_AGENT'] }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">PHP</td>
            @php($issueBody.="**PHP version**: " . PHP_VERSION . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ PHP_VERSION }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">MySQL</td>
            @php($issueBody.="**MySQL version**: " . $mysqlVersion . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ $mysqlVersion }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Laravel</td>
            @php($issueBody.="**Laravel version**: " . app()->version() . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ app()->version() }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">Horizon</td>
            @php($issueBody.="**Horizon version**: " . $horizonVersion . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ $horizonVersion }}
            </td>
        </tr>
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">laravel-mailcoach</td>
            @php($issueBody.="**laravel-mailcoach version**: " . $versionInfo->getCurrentVersion('laravel-mailcoach') . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ $versionInfo->getCurrentVersion('laravel-mailcoach') }}
                @if(! $versionInfo->isLatest('laravel-mailcoach'))
                    <span class="font-sans text-xs inline-flex items-center bg-green-200 text-green-800 rounded-sm px-1 leading-relaxed">
                        <i class="fas fa-horse-head opacity-50 mr-1"></i>
                        {{ __('Upgrade available') }}
                    </span>
                @endif
            </td>
        </tr>
        @if (class_exists(\Spatie\MailcoachUi\MailcoachUiServiceProvider::class))
        <tr>
            <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 font-bold">mailcoach-ui</td>
            @php($issueBody.="**mailcoach-ui version**: " . $versionInfo->getCurrentVersion('mailcoach-ui') . "\n")
            <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 font-mono">
                {{ $versionInfo->getCurrentVersion('mailcoach-ui') }}
                @if(! $versionInfo->isLatest('mailcoach-ui'))
                    <span class="font-sans text-xs inline-flex items-center bg-green-200 text-green-800 rounded-sm px-1 leading-relaxed">
                        <i class="fas fa-horse-head opacity-50 mr-1"></i>
                        {{ __('Upgrade available') }}
                    </span>
                @endif
            </td>
        </tr>
        @endif
        </tbody>
    </table>
</section>
<section class="card mt-4">
    <h2 class="py-4 whitespace-no-wrap text-sm leading-5 font-bold text-lg">Having trouble?</h2>

    <div class="button w-64">
        <a href="https://github.com/spatie/mailcoach-support/issues/new?body={{ urlencode($issueBody) }}" target="_blank" class="font-semibold h-10">
            <x-mailcoach::icon-label icon="fa-question-circle" :text="__('Create a support issue')"/>
        </a>
    </div>
</section>
@endsection
