<div>
    <x-mailcoach::html-field :label="__('Body (HTML)')" name="html" :value="old('html', $html)"></x-mailcoach::html-field>
</div>

<div class="form-buttons">
    <button id="save" type="submit" class="button">
        <x-mailcoach::icon-label icon="fa-code" :text="__('Save content')"/>
    </button>

    <button type="button" class="link-icon" data-modal-trigger="preview">
        <x-mailcoach::icon-label icon="fa-eye" :text="__('Preview')"/>
    </button>
    <x-mailcoach::modal :title="__('Preview')" name="preview" large :open="Request::get('modal')">
        <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
    </x-mailcoach::modal>
</div>
