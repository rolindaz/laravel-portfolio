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
            <li class="d-flex gap-2">
                <a href="{{ route('projects.show', $project) }}">
                    {{ $project->title }}
                </a>
                , Tecnologia utilizzata: {{ $project->tech }}
                , Categoria: {{ $project->category->name }}
                , Tags: 
                @foreach ($project->tags as $tag)
                    <div style="
                    background-color: {{ $tag->color }};"
                    class="rounded-2 px-3">
                        {{ $tag->name }}
                    </div>
                @endforeach
            </li>
        @endforeach
    </ul>
@endsection