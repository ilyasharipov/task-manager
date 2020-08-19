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
                        <div class="form-group row">
                            {{ Form::label('nickname', __('users.nickname'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('nickname', null, ['class' => 'form-control' . ( $errors->has('nickname') ? ' is-invalid' : '' )]) }}
                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('name', __('users.username'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) }}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('lastName', __('users.lastname'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('lastName', null, ['class' => 'form-control' . ( $errors->has('lastName') ? ' is-invalid' : '' )]) }}
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('gender', __('users.gender'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6" >
                                {{ Form::select('gender', ['male"' => 'male', 'female' => 'female'], null, ['class' => 'form-control material-select']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('gender', __('users.birthday'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::date('birthday', null, ['class' => 'form-control' . ( $errors->has('birthday') ? ' is-invalid' : '' )]) }}
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', __('users.email'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', null, ['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' )]) }}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
