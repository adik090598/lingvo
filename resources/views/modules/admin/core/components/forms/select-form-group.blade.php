<div class="form-group {{$required ? ' required' : ''}}">
    <label class="control-label">{{$label}}</label>
    <select class="custom-select" {{$required ? ' required' : ''}} name="{{$name}}" id="custom">
        <option value="" disabled>{{$placeholder}}</option>
        @foreach($options as $option)
            <option value="{{$option['value']}}" {{$option['selected']}}>{{$option['title']}}</option>
        @endforeach
    </select>
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
