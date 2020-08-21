@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('users.edit_profile') }}</div>
                <div class="card-body">
                    {{ Form::model($user, ['route' => ['users.update', $user]]) }}
                        {{ method_field('PATCH') }}
                        {{ Form::bsName('nickname', __('users.nickname')) }}
                        {{ Form::bsName('name', __('users.username')) }}
                        {{ Form::bsName('lastName', __('users.lastname')) }}
                        {{ Form::bsGender('gender', __('users.gender'), ['male"' => 'male', 'female' => 'female']) }}
                        {{ Form::bsBirthday('birthday', __('users.birthday')) }}
                        {{ Form::bsEmail('email', __('users.email')) }}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(__('users.update'), ['class' => 'btn btn-primary']) }}
                                <a class="btn btn-danger" role="submit" href="{{ route('users.destroy', $user) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow">{{ __('users.delete') }}</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
