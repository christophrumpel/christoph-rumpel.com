<div>
    <x-mailcoach::text-field
        :label="__('Tag')"
        name="tag"
        :value="$automation->getTrigger()->tag ?? null"
        required
    />
</div>
