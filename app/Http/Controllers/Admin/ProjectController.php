<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'area_sqft' => 'nullable|string',
            'cost_range' => 'nullable|string',
            'status' => 'required|in:ongoing,completed',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('projects', 'public');
            }
        }

        Project::create(array_merge($validated, ['images' => $imagePaths]));

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'area_sqft' => 'nullable|string',
            'cost_range' => 'nullable|string',
            'status' => 'required|in:ongoing,completed',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePaths = $project->images ?? [];
        
        // Handle removals
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $path) {
                if (($key = array_search($path, $imagePaths)) !== false) {
                    Storage::disk('public')->delete($path);
                    unset($imagePaths[$key]);
                }
            }
            $imagePaths = array_values($imagePaths); // Reset indices
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('projects', 'public');
            }
        }

        $project->update(array_merge($validated, ['images' => $imagePaths]));

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
