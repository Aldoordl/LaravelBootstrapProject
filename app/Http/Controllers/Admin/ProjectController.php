<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        
        return view('bootstrap.admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('bootstrap.admin.project.create');
    }

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
        ]);

        // Simpan gambar di storage
        $imagePath = $request->file('image')->store('project_images', 'public');

        // Simpan proyek ke database
        Project::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        // Catat log aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'create_project',
            'description' => 'User ' . Auth::user()->name . ' created a project: ' . $request->input('title'),
        ]);
        
        return redirect()->route('admin.projects.index')->with('success', 'Success: Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('bootstrap.admin.project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $changes = [];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
    
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('project_images', 'public');
            $project->image = $imagePath;
            $changes[] = 'Image updated';
        }
    
        if ($request->input('title') !== $project->title) {
            $project->title = $request->input('title');
            $changes[] = 'Title updated';
        }
    
        if ($request->input('description') !== $project->description) {
            $project->description = $request->input('description');
            $changes[] = 'Description updated';
        }
        
        $project->save();

        // Catat log aktivitas dengan perubahan yang spesifik
        if (!empty($changes)) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'update_project',
                'description' => 'User ' . Auth::user()->name . ' updated project (' . implode(', ', $changes) . '): ' . $project->title,
            ]);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Success: Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Hapus gambar terlebih dahulu
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Hapus entri proyek dari database
        $project->delete();

        // Catat log aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'delete_project',
            'description' => 'User ' . Auth::user()->name . ' deleted a project: ' . $project->title,
        ]);
        
        return redirect()->route('admin.projects.index')->with('success', 'Success: Project deleted successfully.');
    }
}
