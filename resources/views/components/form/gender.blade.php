<div class="form-group row">
    {{ Form::label($name, $text, ['class' => 'col-md-4 col-form-label text-md-right']) }}
    <div class="col-md-6" >
        {{ Form::select('gender', $value, null, ['class' => 'form-control material-select']) }}
    </div>
</div>
