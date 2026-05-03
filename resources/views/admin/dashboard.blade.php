<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #111827, #1f2937);
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px;
            color: white;
        }

        .sidebar h3 {
            font-weight: 800;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 10px;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #6366f1;
            color: white;
        }

        .main {
            margin-left: 260px;
            padding: 35px;
        }

        .topbar {
            background: white;
            border-radius: 24px;
            padding: 24px 28px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.06);
            margin-bottom: 30px;
        }

        .stat-card {
            border: none;
            border-radius: 26px;
            padding: 26px;
            color: white;
            min-height: 190px;
            box-shadow: 0 18px 35px rgba(0,0,0,0.12);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-6px);
        }

        .stat-card h5 {
            font-size: 15px;
            opacity: 0.9;
        }

        .stat-card h2 {
            font-size: 44px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .bg-project {
            background: linear-gradient(135deg, #2563eb, #60a5fa);
        }

        .bg-skill {
            background: linear-gradient(135deg, #16a34a, #86efac);
        }

        .bg-education {
            background: linear-gradient(135deg, #9333ea, #c084fc);
        }

        .bg-message {
            background: linear-gradient(135deg, #f97316, #fdba74);
        }

        .quick-card {
            background: white;
            border-radius: 26px;
            padding: 28px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.06);
        }

        .btn-modern {
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .btn-purple {
            background: #9333ea;
            color: white;
        }

        .btn-purple:hover {
            background: #7e22ce;
            color: white;
        }

        .user-badge {
            background: #111827;
            color: white;
            padding: 12px 18px;
            border-radius: 14px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h3>Portfolio Admin</h3>

    <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('projects.index') }}">Projects</a>
    <a href="{{ route('skills.index') }}">Skills</a>
    <a href="{{ route('education.index') }}">Education</a>
    <a href="{{ route('contacts.index') }}">Messages</a>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button class="btn btn-danger w-100 rounded-3">Logout</button>
    </form>
</div>

<div class="main">

    <div class="topbar d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-1 fw-bold">Admin Dashboard</h2>
            <p class="text-muted mb-0">Manage your portfolio content easily</p>
        </div>

        <div class="user-badge">
            {{ Auth::user()->name }}
        </div>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="stat-card bg-project">
                <h5>Total Projects</h5>
                <h2>{{ $projectCount }}</h2>
                <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm btn-modern">Manage</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card bg-skill">
                <h5>Total Skills</h5>
                <h2>{{ $skillCount }}</h2>
                <a href="{{ route('skills.index') }}" class="btn btn-light btn-sm btn-modern">Manage</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card bg-education">
                <h5>Total Education</h5>
                <h2>{{ $educationCount }}</h2>
                <a href="{{ route('education.index') }}" class="btn btn-light btn-sm btn-modern">Manage</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card bg-message">
                <h5>Total Messages</h5>
                <h2>{{ $messageCount }}</h2>
                <a href="{{ route('contacts.index') }}" class="btn btn-light btn-sm btn-modern">View Messages</a>
            </div>
        </div>

    </div>

    <div class="quick-card">
        <h4 class="fw-bold mb-2">Quick Actions</h4>
        <p class="text-muted">Add, update, or manage your portfolio data.</p>

        <a href="{{ route('projects.index') }}" class="btn btn-primary btn-modern">Manage Projects</a>
        <a href="{{ route('skills.index') }}" class="btn btn-success btn-modern">Manage Skills</a>
        <a href="{{ route('education.index') }}" class="btn btn-purple btn-modern">Manage Education</a>
        <a href="{{ route('contacts.index') }}" class="btn btn-warning btn-modern">View Messages</a>
    </div>

</div>

</body>
</html>