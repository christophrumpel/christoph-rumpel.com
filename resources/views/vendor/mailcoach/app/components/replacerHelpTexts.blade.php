<div class="mt-12 markup-code alert alert-info text-sm">
    {{ __('You can use following placeholders in the subject and copy of this campaign:') }}
    <ul class="grid mt-2 gap-2">
        @foreach($replacerHelpTexts as $replacerName => $replacerDescription)
            <li><code class="mr-2">::{{ $replacerName }}::</code>{{ $replacerDescription }}</li>
        @endforeach
    </ul>
</div>
