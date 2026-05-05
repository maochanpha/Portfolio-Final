<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skills;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skills::count();
        $educationCount = Education::count();
        $experienceCount = Experience::count();
        $messageCount = Contact::count();

        return view('admin.dashboard', compact(
            'projectCount',
            'skillCount',
            'educationCount',
            'experienceCount',
            'messageCount'
        ));
    }
}
