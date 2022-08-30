@extends('layouts.app')

@section('navbar_menu')
    @include('admin.partials.adminnav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5>Nuovo Post</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="titolo-post">Titolo post</span>
                                        </div>
                                        <input value="{{ old('title') }}" name="title" type="text"
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                            aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Contenuto Post</label>
                                <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                    id="exampleFormControlTextarea1" rows="9">
                                    {{ old('content') }}
                                </textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tags</label>
                                <select type="text" name="tags[]"
                                    class="form-control @error('tags') is-invalid @enderror" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $errors->first('tags') }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="titolo-post">Carica l'immagine del post</span>
                                </div>
                                <input name="fileImg" type="file"
                                    class="form-control {{ $errors->has('fileImg') ? 'is-invalid' : '' }}"
                                    aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <div class="invalid-feedback">
                                    {{ $errors->first('fileImg') }}
                                </div>
                            </div>


                            
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mr-2">Salva</button>
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Annulla</a>
                                </div>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
