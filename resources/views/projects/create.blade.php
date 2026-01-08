@extends('layouts.projects')

@section('title', 'Aggiungi un nuovo progetto')

@section('content')
<div class="container">
    <form class="w-50" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-control mb-3">
            <label for="title">
                Titolo
            </label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-control mb-3">
            <label for="category_id">
                Categoria
            </label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                    
                @endforeach
            </select>
        </div>
        <div class="form-control mb-3">
            <label for="tech">
                Tecnologia utilizzata
            </label>
            <input type="text" name="tech" id="tech">
        </div>
        <div class="form-control mb-3 d-flex gap-4 flex-wrap">
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
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
        </div>
        <button type="submit" class="btn btn-warning">
            Salva
        </button>
    </form> 
</div>
@endsection
