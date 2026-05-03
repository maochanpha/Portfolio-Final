<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #111827, #374151);
            color: white;
            border-radius: 28px;
            padding: 35px;
            margin-bottom: 35px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.15);
        }

        .page-header p {
            color: #d1d5db;
        }

        .btn-modern {
            border-radius: 14px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .project-card {
            border: none;
            border-radius: 26px;
            background: white;
            box-shadow: 0 12px 30px rgba(0,0,0,0.07);
            transition: 0.3s;
            overflow: hidden;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0,0,0,0.12);
        }

        .project-icon {
            width: 55px;
            height: 55px;
            border-radius: 18px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .project-desc {
            min-height: 75px;
            font-size: 14px;
            line-height: 1.6;
        }

        .action-btn {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
        }

        .empty-box {
            background: white;
            border-radius: 26px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(0,0,0,0.06);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-2">Projects</h2>
            <p class="mb-0">Manage your portfolio projects beautifully</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-modern">
                Back
            </a>
            <a href="{{ route('project.create') }}" class="btn btn-warning btn-modern">
                + Add Project
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($projects->count() > 0)
        <div class="row g-4">
            @foreach($projects as $p)
            <div class="col-md-4">
                <div class="project-card h-100">
                    <div class="card-body p-4">

                        <div class="project-icon">
                            {{ strtoupper(substr($p->title, 0, 1)) }}
                        </div>

                        <h5 class="fw-bold mb-2">{{ $p->title }}</h5>

                        <p class="text-muted project-desc">
                            {{ $p->description }}
                        </p>

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('projects.edit', $p->id) }}" class="btn btn-warning btn-sm action-btn">
                                Edit
                            </a>

                            <a href="{{ route('projects.delete', $p->id) }}"
                               class="btn btn-danger btn-sm action-btn"
                               onclick="return confirm('Are you sure you want to delete this project?')">
                                Delete
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="empty-box">
            <h4 class="fw-bold">No projects yet</h4>
            <p class="text-muted">Click Add Project to create your first portfolio project.</p>

            <a href="{{ route('project.create') }}" class="btn btn-dark btn-modern">
                + Add Project
            </a>
        </div>
    @endif

</div>

</body>
</html>