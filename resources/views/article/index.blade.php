@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if(Auth::check())
                    <a class="btn btn-lg mb-2 btn-success" href="{{ route('articles.index') }}" role="button"><i class="fas fa-plus"></i>  Create task status</a>
                @endif
            <a class="btn btn-lg mb-2 btn-primary" href="{{ route('articles.create') }}" role="button"><i class="fas fa-plus-circle"></i>  Create task status</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                     </tr>
                    </thead>
                    @foreach ($articles as $article)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $article->id }}</th>
                                <td><a href="{{ route('articles.show', $article) }}">{{ $article->name }}</a></td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('articles.edit', $article->id) }}" role="button"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" role="submit" href="{{ route('articles.destroy', $article->id) }}" data-method="delete" data-confirm="Are you sure?" rel="nofollow"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection