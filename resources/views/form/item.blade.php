<div class="form-item{{ $errors->has($name) ? ' error' : ''}}">
    <label for="{{ $name }}">
        {{ $label }}
        @if(isset($required) && $required)
            <span class="req">*</span>
        @endif
        @if($errors->has($name))
            <span class="error">{{ $errors->first($name) }}</span>
        @endif
        @if(isset($desc))
            <div class="desc">{{ $desc }}</div>
        @endif
    </label>

    {!! $field !!}

</div>