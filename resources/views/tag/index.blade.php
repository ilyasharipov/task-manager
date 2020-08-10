@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-header"><h3><i class="fas fa-tags"></i>&nbsp;Tags</h3></div>
            <a class="btn btn-lg mb-2 mt-2 btn-primary" href="{{ route('tags.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create tag</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $tag->name }}</td>
                            <td class="text-center">
                                <a class="btn btn-danger" role="submit" href="{{ route('tags.destroy', $tag) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>
</div>
@endsection
