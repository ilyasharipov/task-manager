<div class="form-group row">
    {{ Form::label('password_confirmation', __('users.conf_pass'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
    <div class="col-md-6">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
</div>
