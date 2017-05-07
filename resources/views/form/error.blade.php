@if ($errors->has($field))
    <span class="error">{{ $errors->first($field) }}</span>
@endif
