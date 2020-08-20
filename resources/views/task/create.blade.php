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
                        {{ Form::bsDescription('name', __('tasks.description')) }}
                        <div class="form-group row">
                            {{ Form::label('status_id', __('tasks.status'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('status_id', $statuses, null, ['class' => 'form-control' . ( $errors->has('status_id') ? ' is-invalid' : '' )]) }}
                                @error('status_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('assigned_to_id', __('tasks.assigned_to'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('assigned_to_id', $users, null, ['class' => 'form-control' . ( $errors->has('assigned_to_id') ? ' is-invalid' : '' )]) }}
                                @error('assigned_to_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(__('tasks.create'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
