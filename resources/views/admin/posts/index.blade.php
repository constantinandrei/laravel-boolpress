@extends('layouts.app')

@section('navbar_menu')
    @include('admin.partials.adminnav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach ($posts as $post)
                <div class="col-md-8">
                    <div class="card mb-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col align-self-center">
                                    <div>{{ $post->title }}</div>

                                </div>
                                <div class="col text-right">
                                    <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.posts.show', $post->slug) }}"
                                                class="btn btn-outline-success">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.posts.edit', $post->slug) }}"
                                                class="btn btn-outline-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>


                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>{{ $post->content }}</div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-muted">Scritto da:</span> {{ $post->user->name }}
                                </div>
                                <div class="col-8">
                                    Tags: {{ $post->tags->implode('name', ' - ')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
