@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('users.change') }}</div>
                <div class="card-body">
                    {{ Form::open(['route' => ['change_pass.update', $user]]) }}
                        {{ method_field('PATCH') }}
                        {{ Form::bsPassword('password', __('users.new_pass')) }}
                        {{ Form::bsPassConf('password_confirmation', __('users.conf_pass')) }}
                        {{ Form::bsSubmit(null, __('users.change')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
