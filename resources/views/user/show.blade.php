@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Nickname</th>
                            <td>{{ $user->nickname }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Last name</th>
                            <td>{{ $user->lastName }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Birthday</th>
                            <td>{{ $user->birthday }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Data registation</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
