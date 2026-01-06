@extends('layouts.projects')

@section('title', $project->title)

@section('content')
<ul>
    <li>
        Categoria: {{ $project->category }}
    </li>
    <li>
        Tecnologia utilizzata: {{ $project->tech }}
    </li>
</ul>
@endsection