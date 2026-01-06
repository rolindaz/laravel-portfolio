@extends('layouts.projects')

@section('title', $project->title)

@section('actions')
<div class="d-flex gap-3 my-4">
    <a href="{{ route('projects.edit', $project) }}">
        <button class="btn btn-success">
            Modifica
        </button>
    </a>  
    
    <form action="{{ route('projects.destroy', $project) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Elimina
        </button>
    </form> 
</div>
@endsection

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