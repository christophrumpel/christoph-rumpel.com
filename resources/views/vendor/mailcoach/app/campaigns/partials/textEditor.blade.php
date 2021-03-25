<div>
    <x-mailcoach::html-field :label="__('Body (HTML)')" name="html" :value="old('html', $html)"></x-mailcoach::html-field>
</div>

<div class="form-buttons">
    <x-mailcoach::button id="save" :label="__('Save content')"/>
    <x-mailcoach::button-secondary data-modal-trigger="preview" :label="__('Preview')"/>
    <x-mailcoach::button-secondary data-modal-trigger="send-test" :label="__('Send Test')"/>
</div>
