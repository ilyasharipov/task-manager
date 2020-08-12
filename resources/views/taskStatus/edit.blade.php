@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('taskStatuses.update') }}</div>
                <div class="card-body">
                    {{ Form::model($taskstatus, ['route' => ['taskstatuses.update', $taskstatus->id]]) }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            {{ Form::label('name', __('taskStatuses.name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) }}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(__('taskStatuses.update'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
