@extends('layouts.projects')

@section('title', 'Modifica il tuo progetto')

@section('content')
<div class="container">
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control mb-3">
            <label for="title">
                Titolo
            </label>
            <input 
            type="text"
            name="title"
            id="title"
            value="{{ $project->title }}">
        </div>
        <div class="form-control mb-3">
            <label for="category_id">
                Categoria
            </label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-control mb-3">
            <label for="title">
                Tecnologia utilizzata
            </label>
            <input 
            type="text"
            name="tech"
            id="tech"
            value="{{ $project->tech }}">
        </div>
        <button type="submit" class="btn btn-warning">
            Salva
        </button>
    </form> 
</div>
@endsection