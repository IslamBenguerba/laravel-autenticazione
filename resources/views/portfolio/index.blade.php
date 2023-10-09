

@extends('layouts.public')
@section('title', 'Home')
@section('content')
@dump($projects)
@foreach ( $projects as $project)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$project['titolo']}}</h5>
            <p class="card-text">{{$project['descrizione']}}</p>
            <a href="admin/portfolio/{{ $project->id }}">maggiori</a>
            {{-- <a class="btn btn-success" href="/portfolio/{{ $project->id }}/edit">Edit</a> --}}
            <a class="btn btn-success" href="{{ route('portfolio.edit', $project->id) }}">Edit</a>
        </div>
    </div>
@endforeach
@endsection
