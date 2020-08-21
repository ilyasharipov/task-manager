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
                        {{ Form::bsName('name', __('taskStatuses.name')) }}
                        {{ Form::bsSubmit(null, __('taskStatuses.update')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
