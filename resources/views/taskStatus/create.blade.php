@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('taskStatuses.create') }}</div>
                <div class="card-body">
                    {{ Form::open(['route' => ['taskstatuses.store']]) }}
                        {{ Form::bsName('name', __('taskStatuses.name')) }}
                        {{ Form::bsSubmit(null, __('taskStatuses.create')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
