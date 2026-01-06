@extends('layouts.projects')

@section('title', 'Aggiungi un nuovo progetto')

@section('content')
<div class="container">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-control mb-3">
            <label for="title">
                Titolo
            </label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-control mb-3">
            <label for="title">
                Categoria
            </label>
            <input type="text" name="category" id="category">
        </div>
        <div class="form-control mb-3">
            <label for="title">
                Tecnologia utilizzata
            </label>
            <input type="text" name="tech" id="tech">
        </div>
        <button type="submit" class="btn btn-warning">
            Salva
        </button>
    </form> 
</div>
@endsection
