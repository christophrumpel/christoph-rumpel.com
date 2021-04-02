<div data-segments="{{ $segmentsData->toJson() }}"
    data-segments-selected="{{ old('segment_id', $segmentable->segment_id) }}">
    <x-mailcoach::fieldset :legend="__('Audience')">
        @error('email_list_id')
            <p class="form-error">{{ $message }}</p>
        @enderror

        <div class="form-field">
            <label class="label label-required" for="email_list_id">
                {{ __('List') }}
            </label>
            <div class="select">
                <select name="email_list_id" id="email_list_id" data-segments-email-list required>
                    <option disabled value="">--{{ __('None') }}--</option>
                    @foreach($emailLists as $emailList)
                        <option
                            value="{{ $emailList->id }}"
                            @if(old('email_list_id', $segmentable->email_list_id) == $emailList->id) selected @endif
                        >
                            {{ $emailList->name }}
                        </option>
                    @endforeach
                </select>
                <div class="select-arrow">
                    <i class="far fa-angle-down"></i>
                </div>
            </div>
        </div>

        @if($segmentable->usingCustomSegment())
            <x-mailcoach::help>
                {{ __('Using custom segment') }} {{ $campaign->getSegment()->description() }}.
            </x-mailcoach::help>
        @else
            <div class="form-field">
                @error('segment')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <label class="label label-required" for="segment">
                    {{ __('Segment') }}
                </label>
                <div class="radio-group">
                    <x-mailcoach::radio-field
                        name="segment"
                        :value="$segmentable->notSegmenting()"
                        option-value="entire_list"
                        :label="__('Entire list')"

                    />
                    <div class="flex items-center">
                        <div class="flex-shrink-none">
                            <x-mailcoach::radio-field
                                name="segment"
                                :value="$segmentable->segmentingOnSubscriberTags()"
                                option-value="segment"
                                :label="__('Use segment')"

                            />
                        </div>
                        <div class="ml-4 | hidden" data-segments-create>
                            <a class="link" href="#">{{ __('Create a segment first') }}</a>
                        </div>
                        <div class="ml-4 -my-2 | hidden" data-segments-choose>
                            @error('segment_id')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                            <div class="select">
                                <select name="segment_id"></select>
                                <div class="select-arrow">
                                    <i class="far fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-mailcoach::fieldset>
</div>
