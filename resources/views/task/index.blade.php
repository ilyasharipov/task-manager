@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header"><h3><i class="fas fa-tasks"></i>&nbsp;{{ __('tasks.tasks') }}</h3></div>
                <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('tasks.create') }}" role="button"><i class="fas fa-plus-circle"></i>&nbsp;{{ __('tasks.create') }}</a>
                <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('taskstatuses.index') }}" role="button"><i class="fas fa-cogs"></i>&nbsp;{{ __('tasks.status_sitting') }}</a>
                <a class="btn btn-lg mb-2 mt-2 btn-dark" href="{{ route('tags.index') }}" role="button"><i class="fas fa-tags"></i>&nbsp;{{ __('tasks.tag_sitting') }}</a>
                {{ Form::open(['route' => ['tasks.index'], 'method' => 'get']) }}
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">{{ __('tasks.name') }}</th>
                                <th scope="col">{{ __('tasks.description') }}</th>
                                <th scope="col">{{ __('tasks.status') }}</th>
                                <th scope="col">{{ __('tasks.assigned_to') }}</th>
                                <th colspan="2" scope="col">{{ __('tasks.tags') }}</th>
                                <th scope="col">{{ __('tasks.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="2" class="text-center">
                                    <div class="form-group">
                                        {{ Form::checkbox('filter[myTasks]', 'on', isset($filters['myTasks']), ['class' => 'form-check-input']) }}&nbsp;{{ __('tasks.my_task') }}
                                    </div>
                                </td>
                               <td>
                                   <div class="form-group">
                                       {{ Form::select('filter[status]', $statuses, $filters['status'], ['class' => 'form-control']) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        {{ Form::select('filter[assignedTo]', $users, $filters['assignedTo'], ['class' => 'form-control']) }}
                                    </div>
                                </td>
                                <td colspan="2">
                                    <div class="form-group">
                                        {{ Form::select('filter[tags]', $tags, $filters['tags'], ['class' => 'form-control']) }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                                    <a class="btn btn-secondary" href="{{ route('tasks.index') }}" role="button"><i class="fas fa-sync"></i></a>
                                </td>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ ($tasks->currentPage()-1) * $tasks->perPage() + $loop->index + 1 }}</th>
                                    <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                                    <td>{{ Str::limit($task->description, 10) }}</td>
                                    <td>{{ $task->status->name ?? null }}</td>
                                    <td>{{ $task->assignedTo->nickname ?? null }}</td>
                                    <td class="text-center" colspan="2">
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
                {{ Form::close() }}
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection
