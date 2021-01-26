<div class="form-group {{$required ? ' required' : ''}}">
    <label class="control-label" for="{{$name}}">{{$label}}</label>
    <textarea name="{{$name}}" id="description"
              class="form-control{{ isset($errors) && $errors->has($name) ? ' is-invalid' : '' }} description"
              {{$required ? ' required' : ''}} placeholder="{{$placeholder}}">{{ isset($value) ? $value : old($name) }}</textarea>
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
