@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4><i class="fas fa-user"></i>  {{ $user->name }} {{ $user->lastName }}</h4></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('users.nickname')</th>
                            <td>{{ $user->nickname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('users.username')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('users.lastname')</th>
                            <td>{{ $user->lastName }}</td>
                        </tr>
                        <tr>
                            <th>@lang('users.gender')</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>@lang('users.birthday')</th>
                            <td>{{ $user->birthday }}</td>
                        </tr>
                        @if (Auth::user()->id == $user->id)
                            <tr>
                                <th>@lang('users.email')</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>@lang('users.data_reg')</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
