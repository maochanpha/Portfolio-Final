<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::latest()->get();

        return view('admin.education.index', compact('educations'));
    }

    public function addEdu(Request $request)
    {
        $data = $request->validate([
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Education::create($data);

        return redirect()
            ->route('education.index')
            ->with('success', 'Education added successfully.');
    }

    public function delete($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()
            ->route('education.index')
            ->with('success', 'Education deleted successfully.');
    }
}
