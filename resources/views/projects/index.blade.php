@extends('layouts.projects')

@section('title', 'I miei progetti')

@section('content')
<ul>
        @foreach ($projects as $project)
            <li>
               {{ $project->title }}, {{ $project->category }}
            </li>
        @endforeach
    </ul>
@endsection