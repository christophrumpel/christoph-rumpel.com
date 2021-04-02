<form class="form-grid" action="{{ route('mailcoach.transactionalMails.templates.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Transactional mail template')" required />

    <?php
        $editor = config('mailcoach.transactional.editor', \Spatie\Mailcoach\Domain\Shared\Support\Editor\TextEditor::class);
        $editorName = (new ReflectionClass($editor))->getShortName();
    ?>
    <x-mailcoach::select-field
        :label="__('Type')"
        name="type"
        :options="[
            'html' => 'HTML (' . $editorName . ')',
            'markdown' => 'Markdown',
            'blade' => 'Blade',
            'blade-markdown' => 'Blade with Markdown',
        ]"
    />

@ray($errors)
    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create template')" />
        <x-mailcoach::button-cancel />
    </div>
</form>
