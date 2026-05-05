<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest('start_date')->get();

        return view('admin.experience.index', compact('experiences'));
    }

    public function addExperience(Request $request)
    {
        $data = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Experience::create($data);

        return redirect()
            ->route('experience.index')
            ->with('success', 'Experience added successfully.');
    }

    public function delete($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()
            ->route('experience.index')
            ->with('success', 'Experience deleted successfully.');
    }
}
