@extends('layouts.app')

@section('navbar_menu')
    @include('admin.partials.adminnav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach ($users as $user)
                <div class="col-md-8">
                    
                    <div class="card mb-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col align-self-center">
                                    <div>{{ $user->name }}</div>

                                </div>
                                <div class="col text-right">
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                class="btn btn-outline-success">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
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
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group list-group-flush text-right">
                                        <li class="list-group-item">email:</li>
                                        <li class="list-group-item">role:</li>
                                        <li class="list-group-item">address:</li>
                                        <li class="list-group-item">city:</li>
                                        <li class="list-group-item">phone number:</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $user->email }}</li>
                                        <li class="list-group-item">{{ $user->details ? $user->details->role : 'non specificato' }} </li>
                                        <li class="list-group-item">{{ $user->details->address ?? 'non inserito' }} </li>
                                        <li class="list-group-item">{{ $user->details->city ?? 'non inserito'  }} </li>
                                        <li class="list-group-item">{{ $user->details->phone ?? 'non inserito'  }} </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                
                                <div class="col">
                                    Inserito: {{ $user->created_at }}
                                </div>
                                <div class="col">
                                    Modificato: {{ $user->updated_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
