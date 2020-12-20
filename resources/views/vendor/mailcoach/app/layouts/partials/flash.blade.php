@if(flash()->message)
    <div data-dismiss class="alert-flash alert-flash-visible">
        <div class="alert alert-{{ flash()->class }}">
            {{ flash()->message }}
        </div>
    </div>
@endif
