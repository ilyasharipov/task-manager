@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card col-md-4 my-3 mx-auto">
            <div class="card-block">

                {{ Form::model($user, ['route' => ['users.update', $user], 'method' => 'patch']) }}
                    {{ csrf_field() }}
                    <h2 class="card-title my-3">Account</h2>
                    {{ Form::text('name', $user->name) }}

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    
                        {{ Form::email('email', $user->email) }}

                    {{ Form::submit('Создать') }}
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection