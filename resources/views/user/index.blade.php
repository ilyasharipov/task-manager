@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h3><i class="fa fa-users" aria-hidden="false"></i>  Users</h3></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">Data registation</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->nickname}}</a></td>
                                <td>{{ $user->created_at}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection