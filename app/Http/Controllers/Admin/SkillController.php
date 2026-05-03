<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skills::latest()->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function addSkill(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill = new Skills();
        $skill->name = $data['name'];
        $skill->desccription = $data['description'] ?? null;
        $skill->save();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill added successfully.');
    }

    public function delete($id)
    {
        $skill = Skills::findOrFail($id);
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
