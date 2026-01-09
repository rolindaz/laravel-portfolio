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
        <div class="thumbnail">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name . 'Thumbnail'}}">
        </div>
      </td>
      <td>
        {{ $project->title }}
      </td>
      <td>
        @foreach ($project->technologies as $tech)
            {{ $tech->name . ' / ' }}
        @endforeach
      </td>
      <td>
        {{ $project->created_at }}
      </td>
      <td>
        {{ $project->updated_at }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<ul>
        @foreach ($projects as $project)
            <li class="d-flex gap-2">
                <a href="{{ route('projects.show', $project) }}">
                    {{ $project->title }}
                </a>
                , Tecnologia utilizzata: {{ $project->tech }}
                , Tipologia: {{ $project->type->name }}
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