@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header"><h3><i class="fa fa-users"></i>&nbsp;{{ __('users.header') }}</h3></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('users.nickname') }}</th>
                            <th scope="col">{{ __('users.username') }}</th>
                            <th scope="col">{{ __('users.email') }}</th>
                            <th scope="col">{{ __('users.data_reg') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->nickname }}</a></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
