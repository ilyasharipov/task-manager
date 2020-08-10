@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-header"><h3><i class="fas fa-star-half-alt"></i>&nbsp;Task statuses</h3></div>
            <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('taskstatuses.create') }}" role="button"><i class="fas fa-plus-circle"></i>&nbsp;Create task status</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskStatuses as $taskStatus)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $taskStatus->name }}</td>
                            <td class="text-center">
                                <a class="btn btn-success" href="{{ route('taskstatuses.edit', $taskStatus->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" role="submit" href="{{ route('taskstatuses.destroy', $taskStatus->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $taskStatuses->links() }}
        </div>
    </div>
</div>
@endsection
