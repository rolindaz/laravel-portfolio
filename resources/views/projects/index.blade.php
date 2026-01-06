@extends('layouts.projects')

@section('title', 'I miei progetti')

@section('content')
<ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project->id) }}">
                    {{ $project->title }}
                </a>
                ,{{ $project->category }}
            </li>
        @endforeach
    </ul>
@endsection