<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:
                radial-gradient(circle at top left, rgba(13, 110, 253, 0.12), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #eef2f7 100%);
            min-height: 100vh;
        }

        .edit-shell {
            max-width: 1100px;
        }

        .glass-card {
            border: 0;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
        }

        .project-preview {
            background: linear-gradient(160deg, #0f172a 0%, #1e293b 100%);
            color: #fff;
            border-radius: 24px;
            padding: 1.5rem;
            height: 100%;
        }

        .project-preview img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.08);
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.45rem 0.85rem;
            border-radius: 999px;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-control,
        .form-control:focus {
            border-radius: 16px;
            padding: 0.85rem 1rem;
            box-shadow: none;
        }

        textarea.form-control {
            min-height: 140px;
        }

        .btn-rounded {
            border-radius: 999px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="edit-shell mx-auto">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                <div>
                    <span class="badge-soft">Project Editor</span>
                    <h1 class="fw-bold mt-3 mb-2">Update your project details</h1>
                    <p class="text-muted mb-0">Refresh the content, links, and image shown in your portfolio.</p>
                </div>
                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-rounded">Back to Projects</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card glass-card">
                <div class="card-body p-4 p-lg-5">
                    <div class="row g-4 align-items-stretch">
                        <div class="col-lg-7">
                            <div class="pe-lg-3">
                                <h3 class="fw-bold mb-1">Edit Information</h3>
                                <p class="text-muted mb-4">Keep the content clear and make sure your links still work.</p>

                                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-semibold">Project Title</label>
                                        <input
                                            type="text"
                                            id="title"
                                            name="title"
                                            value="{{ old('title', $project->title) }}"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter project title"
                                        >
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label fw-semibold">Description</label>
                                        <textarea
                                            id="description"
                                            name="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Write a short overview of the project"
                                        >{{ old('description', $project->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="demo" class="form-label fw-semibold">Demo Link</label>
                                            <input
                                                type="text"
                                                id="demo"
                                                name="demo"
                                                value="{{ old('demo', $project->demo) }}"
                                                class="form-control @error('demo') is-invalid @enderror"
                                                placeholder="https://demo.com"
                                            >
                                            @error('demo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="link" class="form-label fw-semibold">GitHub Link</label>
                                            <input
                                                type="text"
                                                id="link"
                                                name="link"
                                                value="{{ old('link', $project->link) }}"
                                                class="form-control @error('link') is-invalid @enderror"
                                                placeholder="https://github.com/username/repo"
                                            >
                                            @error('link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="image" class="form-label fw-semibold">Replace Image</label>
                                        <input
                                            type="file"
                                            id="image"
                                            name="image"
                                            class="form-control @error('image') is-invalid @enderror"
                                        >
                                        <div class="form-text">Leave this empty if you want to keep the current image.</div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row gap-3">
                                        <button type="submit" class="btn btn-dark btn-rounded">Update Project</button>
                                        <a href="{{ route('projects.index') }}" class="btn btn-light border btn-rounded">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="project-preview">
                                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                    <div>
                                        <p class="text-uppercase small mb-2 text-white-50">Current Preview</p>
                                        <h4 class="fw-bold mb-1">{{ $project->title }}</h4>
                                        <p class="text-white-50 mb-0">What visitors currently see in your portfolio.</p>
                                    </div>
                                </div>

                                @if ($project->image)
                                    <img src="{{ $project->image }}" alt="{{ $project->title }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center text-white-50 border border-light border-opacity-25 rounded-4" style="height: 240px;">
                                        No image uploaded
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <p class="mb-2 fw-semibold">Description</p>
                                    <p class="text-white-50 mb-4">{{ $project->description }}</p>

                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="bg-white bg-opacity-10 rounded-4 p-3 h-100">
                                                <p class="small text-white-50 mb-1">Demo</p>
                                                <p class="mb-0 text-truncate">{{ $project->demo ?: 'Not provided' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="bg-white bg-opacity-10 rounded-4 p-3 h-100">
                                                <p class="small text-white-50 mb-1">GitHub</p>
                                                <p class="mb-0 text-truncate">{{ $project->link ?: 'Not provided' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
