@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create task') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" rows="3"></textarea>

                                @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">Task status</label>
                            <div class="col-md-6">
                                <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id" value="{{ old('status_id') }}">
                                    <option value="">Select</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }} ">{{ $status->name }}</option>
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
                            <label for="assigned_to_id" class="col-md-4 col-form-label text-md-right">Assigned to</label>
                            <div class="col-md-6">
                                <select class="form-control @error('assigned_to_id') is-invalid @enderror" id="assigned_to_id" name="assigned_to_id" value="{{ old('assigned_to_id') }}">
                                    <option value="">Select</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }} ">{{ $user->nickname }}</option>
                                    @endforeach
                                </select>

                                @error('assigned_to_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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