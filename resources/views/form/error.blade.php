@if ($errors->has($field))
    <div class="error">{{ $errors->first($field) }}</div>
@endif
