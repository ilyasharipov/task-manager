@extends('layouts.app')

@section('content')


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <th scope="row"><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
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