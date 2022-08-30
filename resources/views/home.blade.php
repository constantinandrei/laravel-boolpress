@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-header">
    
                        {{ __('Gestione Utenti') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="nav">

                            <li class="nav-item mr-3">
                                <a class="nav-link btn btn-outline-info" href="{{ route('admin.users.index') }}"><i class="fa-solid fa-list"></i> Elenco Utenti</a>
                            </li>


                            <form class="form-inline ml-auto my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Cerca post" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
                            </form>

                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
    
                        {{ __('Gestione Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="nav">
                            
                            <li class="nav-item mr-3">
                                <a class="nav-link btn btn-primary" href="{{ route('admin.posts.create') }}"><i class="fa-solid fa-plus"></i> Nuovo Post</a>
                            </li>

                            <li class="nav-item mr-3">
                                <a class="nav-link btn btn-outline-info" href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-list"></i> Elenco Post</a>
                            </li>


                            <form class="form-inline ml-auto my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Cerca post" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
                            </form>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
