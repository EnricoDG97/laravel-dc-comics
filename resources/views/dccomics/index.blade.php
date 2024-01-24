@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="text-center">Lista DC Comics</h2>


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
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
