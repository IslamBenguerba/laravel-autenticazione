@extends('layouts.public')

@section('title', 'More info')

@section('content')
    <div class="card">
        <h2>{{ $project->titolo }}</h2>
        <form action="{{ route('admin.destroy', $project->id) }}" method="POST">
            @csrf

            @method('DELETE')

            <button class="btn btn-danger">Elimina</button>
        </form>
        <p>{{ $project->descrizione }}</p>
    </div>

@endsection
