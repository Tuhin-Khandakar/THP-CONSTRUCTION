<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->paginate(12);
        $categories = Project::distinct()->pluck('category');

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
