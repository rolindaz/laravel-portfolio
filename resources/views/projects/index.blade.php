@extends('layouts.projects')

@section('title', 'I miei progetti')

@section('actions')

<div class="m-4">
    <a href="{{ route('projects.create') }}">
            <button class="btn btn-success">
                Aggiungi un nuovo progetto
            </button>
    </a>  
</div>


@endsection

@section('content')
<ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">
                    {{ $project->title }}
                </a>
                ,{{ $project->category }}
            </li>
        @endforeach
    </ul>
@endsection