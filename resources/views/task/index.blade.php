@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3><i class="fas fa-tasks"></i>  Tasks</h3></div>
                <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('tasks.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create task</a>
                <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('taskstatuses.index') }}" role="button"><i class="fas fa-cogs"></i>  Status settings</a>
                <form action="{{ route('tasks.index') }}" method="GET">
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
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="2">
                                    <div class="form-group">
                                        <label class="form-check-label" for="my_tasks"></label>
                                        <input class="form-check-input" type="checkbox" name="my_tasks" id="my_tasks">My task
                                    </div>
                                </td>  
                                <td>
                                    <div class="form-group">
                                        <label for="status"></label>
                                        <select class="form-control" id="status" name="">
                                            <option name=""></option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="status"></label>
                                        <select class="form-control" id="status" name="">
                                            <option name=""></option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="status"></label>
                                        <select class="form-control" id="status" name="">
                                            <option name=""></option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="status"></label>
                                        <select class="form-control" id="" name="">
                                            <option name=""></option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-danger" role="submit" href="" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                                    <td>{{ Str::limit($task->description, 10) }}</td>
                                    <td>{{ $task->status->name ?? null }}</td>
                                    <td>{{ $task->creator->nickname }}</td>
                                    <td>{{ $task->assignedTo->nickname ?? null }}</td>
                                    <td>
                                        @foreach ($task->tags as $tag)
                                            <span class="badge badge-primary">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" role="submit" href="{{ route('tasks.destroy', $task->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                <form>
            
        </div>
    </div>
</div>
@endsection