<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }
    public function createProject()
    {
        return view('admin.projects.create');
    }
    public function addProject(Request $req)
    {
        $data= $req->validate([
            'title' => 'required',
            'description' =>'required',
            'demo' => 'nullable',
            'link' => 'nullable',
        ]);
        $data['user_id'] = Auth::user()->id;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('product', $fileName);
            $data['image'] = url('product/' . $fileName);
        }
        Project::create($data);
        return redirect('/admin/project/create')->with('success', 'Project added');
    }

    public function edit($id)
{
    $project = Project::findOrFail($id);
    return view('admin.projects.edit', compact('project'));
}

public function update(Request $req, $id)
{
    $project = Project::findOrFail($id);

    $data = $req->validate([
        'title' => 'required',
        'description' => 'required',
        'demo' => 'nullable',
        'link' => 'nullable',
    ]);

    if($req->hasFile('image')){
        $file = $req->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('product', $fileName);
        $data['image'] = url('product/' . $fileName);
    }

    $project->update($data);

    return redirect('/admin/projects')->with('success', 'Project updated');
}

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
    
}
