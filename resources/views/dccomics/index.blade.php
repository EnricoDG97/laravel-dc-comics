@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="text-center">Lista DC Comics</h2>
        <div class="container text-center">
            <a class="text-center" href="{{ route('dccomics.create') }}">Crea Nuovo DC Comic</a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success mt-4">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dccomics as $dccomic)
                            <tr>
                                <th scope="row"> {{ $dccomic->id }}</th>
                                <td>{{ $dccomic->title }}</td>
                                <td>{{ $dccomic->type }}</td>
                                <td>
                                    <a class="btn btn-success"
                                        href="{{ route('dccomics.show', ['dccomic' => $dccomic->id]) }}"> Dettagli </a>
                                    <a class="btn btn-warning"
                                        href="{{ route('dccomics.edit', ['dccomic' => $dccomic->id]) }}"> Modifica </a>
                                    <form action="{{ route('dccomics.destroy', ['dccomic' => $dccomic->id]) }}"
                                        class="d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"data-title="{{ $dccomic->title }}" class="btn btn-danger btn-delete">
                                            Cancella
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                @include('partials.delete-modal')
            </div>
        </div>
    </div>
@endsection
