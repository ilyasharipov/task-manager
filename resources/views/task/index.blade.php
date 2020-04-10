@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3><i class="fas fa-tasks"></i>  Tasks</h3></div>
                @if(Auth::check())
                    <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('tasks.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create task</a>
                    <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('taskstatuses.index') }}" role="button"><i class="fas fa-cogs"></i>  Status settings</a>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Assigned to</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Actions</th>
                     </tr>
                    </thead>
                    @foreach ($tasks as $task)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->name }}</td>
                                <td><a href="{{ route('tasks.show', $task->id) }}">{{ Str::limit($task->description, 10) }}</a></td>
                                <td>{{ $task->status->name ?? null }}</td>
                                <td>{{ $task->creator->nickname }}</td>
                                <td>{{ $task->assignedTo->nickname ?? null}}</td>
                                <td>{{ $task->tags }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" role="submit" href="{{ route('tasks.destroy', $task->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection