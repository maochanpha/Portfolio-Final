<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(22, 163, 74, 0.14), transparent 30%),
                linear-gradient(180deg, #f7fbf8 0%, #edf4ef 100%);
        }

        .page-shell {
            max-width: 1180px;
        }

        .hero-card,
        .panel-card,
        .skill-card {
            border: 0;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .hero-card {
            overflow: hidden;
        }

        .hero-accent {
            background: linear-gradient(135deg, #166534, #22c55e);
            color: white;
        }

        .hero-stat {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 20px;
            padding: 1rem 1.25rem;
        }

        .skill-card {
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .skill-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 50px rgba(15, 23, 42, 0.12);
        }

        .skill-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            background: rgba(22, 163, 74, 0.12);
            color: #15803d;
            font-weight: 700;
            font-size: 0.88rem;
        }

        .form-control,
        .form-control:focus {
            border-radius: 18px;
            padding: 0.85rem 1rem;
            box-shadow: none;
        }

        textarea.form-control {
            min-height: 130px;
        }

        .btn-pill {
            border-radius: 999px;
            padding: 0.8rem 1.4rem;
            font-weight: 600;
        }

        .empty-state {
            border: 2px dashed rgba(21, 128, 61, 0.18);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.78);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="page-shell mx-auto">
            <div class="card hero-card mb-4">
                <div class="row g-0">
                    <div class="col-lg-7">
                        <div class="p-4 p-lg-5">
                            <span class="skill-badge mb-3">Skills Manager</span>
                            <h1 class="fw-bold mb-3">Build your tech stack section</h1>
                            <p class="text-muted mb-4">
                                Add the tools, frameworks, and strengths you want visitors to see on your portfolio.
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-pill">Back to Dashboard</a>
                                <a href="#add-skill" class="btn btn-success btn-pill">Add New Skill</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 hero-accent">
                        <div class="h-100 d-flex flex-column justify-content-center p-4 p-lg-5">
                            <p class="text-uppercase small mb-2 text-white-50">Overview</p>
                            <h2 class="display-5 fw-bold mb-4">{{ $skills->count() }}</h2>
                            <div class="hero-stat">
                                <div class="small text-white-50 mb-1">Current total</div>
                                <div class="fw-semibold">Skills ready for your portfolio showcase</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-4" id="add-skill">
                    <div class="card panel-card h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-2">Add a Skill</h3>
                            <p class="text-muted mb-4">Create a short, clear entry for your portfolio.</p>

                            <form action="{{ route('skills.addSkill') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Skill Name</label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Laravel, React, MySQL..."
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea
                                        id="description"
                                        name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Briefly describe what you use this skill for"
                                    >{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success btn-pill w-100">Save Skill</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    @if($skills->isEmpty())
                        <div class="empty-state h-100 d-flex flex-column justify-content-center align-items-center text-center p-5">
                            <h3 class="fw-bold mb-2">No skills added yet</h3>
                            <p class="text-muted mb-0">Start by adding your first skill from the form on the left.</p>
                        </div>
                    @else
                        <div class="row g-4">
                            @foreach($skills as $skill)
                                <div class="col-md-6">
                                    <div class="card skill-card">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                                <div>
                                                    <span class="skill-badge">Skill</span>
                                                    <h4 class="fw-bold mt-3 mb-1">{{ $skill->name }}</h4>
                                                </div>

                                                <form action="{{ route('skills.delete', $skill->id) }}" method="POST" onsubmit="return confirm('Delete this skill?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                                </form>
                                            </div>

                                            <p class="text-muted mb-0">
                                                {{ $skill->desccription ?: 'No description added yet.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
