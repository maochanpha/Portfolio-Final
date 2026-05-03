<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Skills;
use App\Models\Education;
use App\Models\Contact;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skills::count();
        $educationCount = Education::count();
        $messageCount = Contact::count();

        return view('admin.dashboard', compact(
            'projectCount',
            'skillCount',
            'educationCount',
            'messageCount'
        ));
    }
}