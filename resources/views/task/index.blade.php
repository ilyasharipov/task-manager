@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3><i class="fas fa-tasks"></i>  Tasks</h3></div>
                <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('tasks.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create task</a>
                <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('taskstatuses.index') }}" role="button"><i class="fas fa-cogs"></i>  Status settings</a>
                <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('tags.index') }}" role="button"><i class="fas fa-tags"></i>  Tag settings</a>
                <form action="{{ route('tasks.index') }}" method="GET">
                <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Assigned to</th>
                                <th colspan="2" scope="col">Tags</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="2" class="text-center">
                                    <div class="form-group">
                                        <input class="form-check-input" value="on" type="checkbox" name="myTasks" id="myTasks" {{ Request::get('myTasks') == 'on' ? 'checked' : '' }}>My task
                                    </div>
                                </td>  
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="status" name="status">
                                        <option value="">Select</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ Request::get('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="assignedTo" name="assignedTo">
                                            <option value="">Select</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ Request::get('assignedTo') == $user->id ? 'selected' : '' }}>{{ $user->nickname }}</option>
                                            @endforeach
                                        </select>
                                    <div>
                                </td>
                                <td colspan="2">
                                    <div class="form-group">
                                        <select class="form-control" id="tag" name="tag">
                                            <option value="">Select</option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->name }}" {{ Request::get('tag') == $tag->name ? 'selected' : '' }}>{{ $tag->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-secondary" href="{{ route('tasks.index') }}" role="button"><i class="fas fa-sync"></i></i></a>
                                </td>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                                    <td>{{ Str::limit($task->description, 10) }}</td>
                                    <td>{{ $task->status->name ?? null }}</td>
                                    <td>{{ $task->assignedTo->nickname ?? null }}</td>
                                    <td colspan="2">
                                        @foreach ($task->tags as $tag)
                                            <span class="badge badge-primary">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" role="submit" href="{{ route('tasks.destroy', $task->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                <form>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection