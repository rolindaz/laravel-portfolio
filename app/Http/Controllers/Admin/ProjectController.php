<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $tags = Tag::all();
        $types = Type::all();
        return view('projects.index', compact(['projects', 'tags', 'types']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('projects.create', compact(['types', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        // dd($data);
        $newProject = new Project;

        $newProject->title = $data['title'];
        // dd($newProject);
        $newProject->Type_id = $data['Type_id'];
        $newProject->tech = $data['tech'];

        // dd($data);

        if(array_key_exists('image', $data)) {
            // dump("l'immagine c'è");
            $img_url = Storage::putFile('projects', $data['image']);
            $newProject->image = $img_url;
        }

        // dd($data);

        $newProject->save();
        // dd($newProject);

        if($request->has('tags')) {
            $newProject->tags()->attach($data['tags']);
        }

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->Type);
        $tags = Tag::all();
        return view('projects.show', compact(['project', 'tags']));
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('projects.edit', compact([
            'project',
            'types',
            'tags'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->title = $data['title'];
        $project->Type_id = $data['Type_id'];
        $project->tech = $data['tech'];
        
        // dd($data);

        if(array_key_exists('image', $data)) {
            Storage::delete($project->image);
            $img_url = Storage::putFile('projects', $data['image']);
            $project->image = $img_url;
        };

        $project->update();

        if($request->has('tags')) {
            $project->tags()->sync($data['tags']);
        } else {
            $project->tags()->detach();
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        if($project->tags) {
           $project->tags()->detach();
        }
        $project->delete();
        return redirect()->route('projects.index');
    }
}
