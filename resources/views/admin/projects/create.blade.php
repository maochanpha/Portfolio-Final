<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-wrapper {
            max-width: 900px;
            margin: auto;
        }

        .header-box {
            background: linear-gradient(135deg, #111827, #374151);
            color: white;
            border-radius: 28px;
            padding: 35px;
            margin-bottom: 25px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.15);
        }

        .header-box p {
            color: #d1d5db;
        }

        .form-card {
            background: white;
            border-radius: 28px;
            padding: 35px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            border-radius: 14px;
            padding: 13px 15px;
            border: 1px solid #e5e7eb;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99,102,241,0.12);
        }

        .btn-modern {
            border-radius: 14px;
            padding: 11px 22px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="form-wrapper">

        <div class="header-box d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-2">Add New Project</h2>
                <p class="mb-0">Create a new project for your portfolio</p>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-light btn-modern">
                Back
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('addProject') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Project Title</label>
                    <input type="text" name="title" class="form-control"
                           placeholder="Example: Portfolio Website" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Project Description</label>
                    <textarea name="description" class="form-control" rows="5"
                              placeholder="Write a short description about your project..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Project Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Demo Link</label>
                        <input type="text" name="demo" class="form-control"
                               placeholder="https://your-demo-link.com">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">GitHub Link</label>
                        <input type="text" name="link" class="form-control"
                               placeholder="https://github.com/username/project">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-modern">
                        Cancel
                    </a>

                    <button class="btn btn-dark btn-modern">
                        Save Project
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>