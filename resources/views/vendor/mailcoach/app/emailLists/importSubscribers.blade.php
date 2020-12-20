@extends('mailcoach::app.layouts.app', ['title' => __('Import subscribers') . ' | ' . $emailList->name])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li><a href="{{ route('mailcoach.emailLists') }}"><span class="breadcrumb">{{ __('Lists') }}</span></a></li>
            <li><a href="{{ route('mailcoach.emailLists.subscribers', [$emailList]) }}"><span class="breadcrumb">{{ $emailList->name }}</span></a></li>
            <li><span class="breadcrumb">{{ __('Import subscribers') }}</span></li>
        </ul>
    </nav>
@endsection

@section('content')
    <section class="card">
        @if (count($subscriberImports))
            <table class="table table-fixed mb-12">
                <thead>
                <tr>
                    <th class="w-32">{{ __('Status') }}</th>
                    <th class="w-48 th-numeric">{{ __('Started at') }}</th>
                    <th>{{ __('List') }}</th>
                    <th class="w-56 th-numeric">{{ __('Imported subscribers') }}</th>
                    <th class="w-32 th-numeric">{{ __('Errors') }}</th>
                    <th class="w-12"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriberImports as $subscriberImport)
                    <tr>
                        <td>
                            @switch($subscriberImport->status)
                                @case(\Spatie\Mailcoach\Enums\SubscriberImportStatus::PENDING)
                                <i title="{{ __('Scheduled') }}" class="far fa-clock text-orange-500`"></i>
                                @break
                                @case(\Spatie\Mailcoach\Enums\SubscriberImportStatus::IMPORTING)
                                <i title="{{ __('Importing') }}" class="fas fa-sync fa-spin text-blue-500"></i>
                                @break
                                @case(\Spatie\Mailcoach\Enums\SubscriberImportStatus::COMPLETED)
                                <i title="{{ __('Completed') }}" class="fas fa-check text-green-500"></i>
                                @break
                            @endswitch
                        </td>
                        <td class="td-numeric">
                            {{ $subscriberImport->created_at->toMailcoachFormat() }}
                        </td>
                        <td>{{ $subscriberImport->emailList->name }}</td>
                        <td class="td-numeric">{{ $subscriberImport->imported_subscribers_count }}</td>
                        <td class="td-numeric">{{ $subscriberImport->error_count }}</td>
                        <td class="td-action">
                            <div class="dropdown" data-dropdown>
                                <button class="icon-button" data-dropdown-trigger>
                                    <i class="fas fa-ellipsis-v | dropdown-trigger-rotate"></i>
                                </button>
                                <ul class="dropdown-list dropdown-list-left | hidden" data-dropdown-list>
                                    <li>
                                        <a href="{{ route('mailcoach.subscriberImport.downloadAttachment', [$subscriberImport, 'importedUsersReport']) }}" download>
                                            <x-mailcoach::icon-label icon="fa-list" :text="__('Import report')"/>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mailcoach.subscriberImport.downloadAttachment', [$subscriberImport, 'errorReport']) }}" download>
                                            <x-mailcoach::icon-label icon="fa-exclamation-triangle" :text="__('Error report')"/>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mailcoach.subscriberImport.downloadAttachment', [$subscriberImport, 'importFile']) }}" download>
                                            <x-mailcoach::icon-label icon="fa-file-upload" :text="__('Uploaded file')"/>
                                        </a>
                                    </li>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.subscriberImport.delete', $subscriberImport->id)"
                                            method="DELETE" class="link-delete">
                                            <x-mailcoach::icon-label icon="fa-trash-alt" :text="__('Delete')" :caution="true"/>
                                        </x-mailcoach::form-button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <form class="flex" enctype="multipart/form-data" method="POST"
              action="{{ route('mailcoach.emailLists.import-subscribers', $emailList) }}">
            @csrf

            <div class=button>
                <button class="font-semibold h-10" type="submit">
                    <x-mailcoach::icon-label icon="fa-cloud-upload-alt" :text="__('Import subscribers')"/>
                </button>
                <input onchange="this.form.submit();" class="absolute inset-0 opacity-0 text-4xl" accept=".csv, .xlsx" type="file" id="file"
                       name="file" class="w-48 h-10"/>
            </div>

            @error('file')
            <p class="form-error">{{ $message }}</p>
            @enderror


        </form>

        <p class="alert alert-info mt-6">
            {!! __('Upload a CSV or XLSX file with these columns: email, first_name, last_name, tags <a href=":link" target="_blank">(see documentation)</a>', ['link' => 'https://mailcoach.app/docs/v2/app/lists/subscribers#importing-subscribers']) !!}
        </p>
    </section>
@endsection
