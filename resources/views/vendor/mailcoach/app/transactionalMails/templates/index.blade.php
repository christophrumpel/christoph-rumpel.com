<x-mailcoach::layout-main :title="__('Transactional templates')">
        <div class="table-actions">
            <x-mailcoach::button data-modal-trigger="create-template" :label="__('Create template')"/>

            <x-mailcoach::modal :title="__('Create template')" name="create-template" :open="$errors->any()">
                @include('mailcoach::app.transactionalMails.templates.partials.create')
            </x-mailcoach::modal>

            @if($templatesCount)
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter templates…')"/>
                </div>
            @endif
        </div>

        @if($templatesCount)
            <table class="table table-fixed">
                <thead>
                <tr>
                    <x-mailcoach::th sort-by="subject">{{ __('Name') }}</x-mailcoach::th>
                    <x-mailcoach::th class="w-12" />
                </tr>
                </thead>
                <tbody>
                @foreach($templates as $template)
                    <tr class="markup-links">
                        <td><a href="{{ route('mailcoach.transactionalMails.templates.edit', $template) }}">{{ $template->name }}</a></td>

                        <td class="td-action">
                            <x-mailcoach::dropdown direction="left">
                                <ul>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.transactionalMails.templates.duplicate', $template)"
                                        >
                                            <x-mailcoach::icon-label icon="fas fa-random" :text="__('Duplicate')" />
                                        </x-mailcoach::form-button>
                                    </li>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.transactionalMails.templates.delete', $template)"
                                            method="DELETE"
                                            data-confirm="true"
                                            :data-confirm-text="__('Are you sure you want to delete template :template?', ['template' => $template->name])"
                                        >
                                            <x-mailcoach::icon-label icon="far fa-trash-alt" :text="__('Delete')" :caution="true" />
                                        </x-mailcoach::form-button>
                                    </li>
                                </ul>
                            </x-mailcoach::dropdown>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <x-mailcoach::table-status
                :name="__('mail|mails')"
                :paginator="$templates"
                :total-count="$templatesCount"
                :show-all-url="route('mailcoach.templates')"></x-mailcoach::table-status>
        @else
            <x-mailcoach::help>
                {!! __('You have not created any templates yet.') !!}
            </x-mailcoach::help>
        @endif
    </section>
</x-mailcoach::layout-main>
