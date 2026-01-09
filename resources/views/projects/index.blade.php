@extends('layouts.projects')

@section('title', 'Dashboard')

@section('actions')

<div class="m-4">
    <a href="{{ route('projects.create') }}">
            <button class="btn btn-success">
                + New Project
            </button>
    </a>  
</div>

@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">
        Thumbnail
    </th>
      <th scope="col">
        Title
    </th>
      <th scope="col">
        Tech
    </th>
      <th scope="col">
        Added
    </th>
    <th scope="col">
        Last Updated
    </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>
        <a class="text-decoration-none text-black" href="{{ route('projects.show', $project) }}">
          <div class="thumbnail">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name . 'Thumbnail'}}">
          </div>
        </a>
      </td>
      <td>
        <a class="text-decoration-none text-black" href="{{ route('projects.show', $project) }}">
          {{ $project->title }}
        </a>
      </td>
      <td>
        @foreach ($project->technologies as $index => $tech)
            {{ $tech->name }} 
            @if (!$loop->last) / @endif
        @endforeach
      </td>
      <td>
        {{ $project->created_at->diffForHumans() }}
      </td>
      <td>
        {{ $project->updated_at->diffForHumans() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection