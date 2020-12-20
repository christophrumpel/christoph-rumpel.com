{{-- [data-turbolinks-permanent] is necessary to preserve the cursor state during focus --}}
<div class="search">
    <input type="search" required placeholder="{{ $placeholder }}" value="{{ $value }}"
        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
        id="turbolinks-search-{{ Illuminate\Support\Str::slug($queryString->disable('filter[search]')) }}"
        data-turbolinks-permanent
        data-turbolinks-search
        data-turbolinks-search-url="{{ url($queryString->filter('search', '%search%')) }}"
        data-turbolinks-search-clear-url="{{ url($queryString->disable('filter[search]')) }}">
    <div class="search-icon">
        <i class="fas fa-search"></i>
    </div>
</div>
