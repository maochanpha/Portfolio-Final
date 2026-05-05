<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skills;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $skills = Skills::latest()->get();
        $educations = Education::latest()->get();
        $experiences = Experience::latest('start_date')->get();

        return view('portfolio', compact('projects', 'skills', 'educations', 'experiences'));
    }
}
