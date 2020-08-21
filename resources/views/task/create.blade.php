@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('tasks.create') }}</div>
                <div class="card-body">
                    {{ Form::open(['route' => ['tasks.store'], 'method' => 'post']) }}
                        {{ Form::bsName('name', __('tasks.name')) }}
                        {{ Form::bsDescription('description', __('tasks.description')) }}
                        {{ Form::bsStatus('status_id', __('tasks.status'), $statuses) }}
                        {{ Form::bsAssigned('assigned_to_id', __('tasks.assigned_to'), $users) }}
                        <div class="form-group row">
                            {{ Form::label('tags', __('tasks.add'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                <select class="simple-select2 form-control @error('tags') is-invalid @enderror" id="tags" multiple="multiple" name="tags[]">
                                    @foreach ($tags as $tag)
                                        <option>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        {{ Form::bsSubmit(null, __('tasks.create')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
