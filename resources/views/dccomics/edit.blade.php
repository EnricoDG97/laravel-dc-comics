@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Modifica DC Comic: {{ $dccomic->title }}</h3>

        <div class="row justify-content-center">
            <div class="col-8">

                <form class="mb-5" action="{{route('dccomics.show', ['dccomic' => $dccomic->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label"> TITOLO </label>
                        <input type="text" class="form-control" name="title" id="title"
                        value="{{$dccomic->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"> DESCRIZIONE </label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="description">{{$dccomic->description}}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label"> IMMAGINE </label>
                        <input type="text" class="form-control" name="thumb" id="thumb"
                        value="{{$dccomic->thumb}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label"> PREZZO </label>
                        <input type="number" class="form-control" name="price" id="price"
                        value="{{$dccomic->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label"> SERIE </label>
                        <input type="text" class="form-control" name="series" id="series"
                        value="{{$dccomic->series}}">
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label"> DATA </label>
                        <input type="date" class="form-control" name="sale_date" id="sale_date"
                        value="{{$dccomic->sale_date}}">
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label"> TIPOLOGIA </label>
                        <select class="form-select" name="type" id="type">
                            <option value="">Seleziona</option>
                            <option @selected($dccomic->type === 'graphic novel') value="graphic novel"> Graphic Novel </option>
                            <option @selected($dccomic->type === 'comic book')  value="comic book"> Comic Book</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger">Salva modifica</button>
                </form>

            </div>
        </div>
    </div>
@endsection
