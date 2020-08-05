@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('tasks.update')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('tasks.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $task->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">@lang('tasks.description')</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ $task->description }}</textarea>

                                @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">@lang('tasks.status')</label>
                            <div class="col-md-6">
                                <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id" value="{{ $task->status_id ?? null }}">
                                    @foreach($statuses as $status)
                                        @if (isset($task->status->id))
                                            <option value="{{ $status->id }}" {{ $status->id == $task->status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @else
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('status_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assigned_to_id" class="col-md-4 col-form-label text-md-right">@lang('tasks.assigned_to')</label>
                            <div class="col-md-6">
                                <select class="form-control @error('assigned_to_id') is-invalid @enderror" id="assigned_to_id" name="assigned_to_id" value="{{ $task->assigned_to_id ?? null }}">
                                    @foreach($users as $user)
                                        @if (isset($task->assignedTo->id))
                                            <option value="{{ $user->id }}" {{ $task->assignedTo->id === $user->id ? 'selected' : '' }}>{{ $user->nickname }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->nickname }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>

                                @error('assigned_to_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">@lang('tasks.tags')</label>
                            <div class="col-md-6">
                                <select class="simple-select2 form-control @error('tags') is-invalid @enderror" id="tags" multiple="multiple" name="tags[]">
                                    @foreach ($tags as $tag)
                                        @if (in_array($tag->name, $selectedTags))
                                            <option selected="selected">{{ $tag->name }}</option>
                                        @else
                                            <option>{{ $tag->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('tasks.update')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
