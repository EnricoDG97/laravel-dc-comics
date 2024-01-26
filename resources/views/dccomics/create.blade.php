@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Nuovo DC Comic</h3>

        <div class="row justify-content-center">
            <div class="col-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="mb-5" action="{{ route('dccomics.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label"> TITOLO </label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"> DESCRIZIONE </label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="description"> {{ old('description') }} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label"> IMMAGINE </label>
                        <input type="text" class="form-control" name="thumb" id="thumb"
                            value="{{ old('thumb') }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label"> PREZZO </label>
                        <input type="number" class="form-control" name="price" id="price"
                            value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label"> SERIE </label>
                        <input type="text" class="form-control" name="series" id="series"
                            value="{{ old('series') }}">
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label"> DATA </label>
                        <input type="date" class="form-control" name="sale_date" id="sale_date"
                            value="{{ old('sale_date') }}">
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label"> TIPOLOGIA </label>
                        <select class="form-select" name="type" id="type">
                            <option value="">Seleziona</option>
                            <option @selected(old('type') === 'graphic novel') value="graphic novel"> Graphic Novel </option>
                            <option @selected(old('type') === 'comic book') value="comic book"> Comic Book</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Salva nuovo</button>
                </form>

            </div>
        </div>
    </div>
@endsection
