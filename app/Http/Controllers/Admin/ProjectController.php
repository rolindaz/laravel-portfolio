<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Category;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $tags = Tag::all();
        return view('projects.index', compact(['projects', 'tags']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('projects.create', compact(['categories', 'tags']));
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
        $newProject->category_id = $data['category_id'];
        $newProject->tech = $data['tech'];

        $newProject->save();
        // dd($newProject);

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->category);
        $tags = Tag::all();
        return view('projects.show', compact(['project', 'tags']));
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('projects.edit', compact(['project', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->title = $data['title'];
        $project->category_id = $data['category_id'];
        $project->tech = $data['tech'];

        $project->update();

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
