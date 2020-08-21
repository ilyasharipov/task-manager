<div class="form-group row">
    {{ Form::label($name, $text, ['class' => 'col-md-4 col-form-label text-md-right']) }}
    <div class="col-md-6">
        {{ Form::email($name, null, ['class' => 'form-control' . ( $errors->has($name) ? ' is-invalid' : '' )]) }}
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
