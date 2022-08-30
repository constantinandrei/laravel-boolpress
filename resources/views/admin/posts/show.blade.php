@extends('layouts.app')

@section('navbar_menu')
    @include('admin.partials.adminnav')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Titolo: {{ $post->title }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="col-3">
                            <img class="img-fluid" src="{{ asset('/storage/' . $post->imgUrl) }}" alt="Immagine Post">
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Slug: {{ $post->slug }}</li>
                        <li class="list-group-item">Tags: {{ $post->tags->implode('name', ', ') }}</li>
                        <li class="list-group-item">Scritto da: {{ $post->user->name }}</li>
                        <li class="list-group-item">Creazione: {{ $post->created_at }}</li>
                        <li class="list-group-item">Ultima modifica: {{ $post->updated_at }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-primary mr-2">Modifica</a>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mr-2">Indietro</a>
                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger mr-2">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection