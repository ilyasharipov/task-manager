@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header"><h3><i class="fas fa-star-half-alt"></i>  Task statuses</h3></div>
                @if(Auth::check())
                    <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('taskstatuses.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create task status</a>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($taskStatuses as $taskStatus)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $taskStatus->name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('taskstatuses.edit', $taskStatus->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" role="submit" href="{{ route('taskstatuses.destroy', $taskStatus->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $taskStatuses->links() }}
        </div>
    </div>
</div>
@endsection