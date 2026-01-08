@extends('layouts.projects')

@section('title', 'Modifica il tuo progetto')

@section('content')
<div class="container">
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
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
        <div class="form-control mb-3 d-flex gap-4 flex-wrap">
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" {{ $project->tags->contains($tag->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>      
            @endforeach
        </div>
        <div class="form-control mb-3 d-flex gap-4 flex-wrap">
            <label for="image">
                Immagine
            </label>
            <input id="image" name="image" type="file">
            @if($project->image)
                <img class="img-fluid w-25" src="{{ asset('storage/' . $project->image) }}" alt="copertina">
            @endif
        </div>
        <button type="submit" class="btn btn-warning">
            Salva
        </button>
    </form> 
</div>
@endsection