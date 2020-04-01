@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->name }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <td>{{ $article->id }}</td>
                        </tr>
                        <tr>
                            <th>name</th>
                            <td>{{ $article->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
