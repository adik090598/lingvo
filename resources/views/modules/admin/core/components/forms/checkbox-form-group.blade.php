<div class="form-group {{$required ? ' required' : ''}}">
    <label class="control-label">{{$label}}</label>
    <ul>
        @foreach($options as $option)
            <li>
                <label class="form-check-label">
                    <input type="checkbox" value="{{$option['value']}}" name="{{$name}}"
                           {{ $option['checked'] ? 'checked' : '' }} class="form-check-input">
                    {{ $option['title'] }}
                </label>
            </li>
        @endforeach
    </ul>
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
