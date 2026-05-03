<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(147, 51, 234, 0.16), transparent 28%),
                linear-gradient(180deg, #faf7ff 0%, #f1ecfb 100%);
        }

        .page-shell {
            max-width: 1200px;
        }

        .surface-card,
        .timeline-card,
        .entry-card {
            border: 0;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .hero-accent {
            background: linear-gradient(135deg, #7e22ce 0%, #c084fc 100%);
            color: white;
            border-radius: 28px;
        }

        .hero-pill,
        .tag-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 700;
        }

        .hero-pill {
            background: rgba(126, 34, 206, 0.1);
            color: #7e22ce;
        }

        .tag-pill {
            background: rgba(147, 51, 234, 0.1);
            color: #7e22ce;
        }

        .hero-stat {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 22px;
            padding: 1rem 1.2rem;
        }

        .form-control,
        .form-control:focus {
            border-radius: 18px;
            padding: 0.85rem 1rem;
            box-shadow: none;
        }

        .btn-pill {
            border-radius: 999px;
            padding: 0.8rem 1.4rem;
            font-weight: 600;
        }

        .timeline-wrap {
            position: relative;
            padding-left: 1.5rem;
        }

        .timeline-wrap::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0.45rem;
            width: 3px;
            background: linear-gradient(180deg, #a855f7 0%, #e9d5ff 100%);
            border-radius: 999px;
        }

        .entry-card {
            position: relative;
            margin-left: 1.25rem;
        }

        .entry-card::before {
            content: "";
            position: absolute;
            top: 1.7rem;
            left: -1.95rem;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #9333ea;
            box-shadow: 0 0 0 6px rgba(147, 51, 234, 0.12);
        }

        .empty-state {
            border: 2px dashed rgba(147, 51, 234, 0.18);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.78);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="page-shell mx-auto">
            <div class="row g-4 mb-4">
                <div class="col-lg-7">
                    <div class="surface-card h-100">
                        <div class="card-body p-4 p-lg-5">
                            <span class="hero-pill mb-3">Education Manager</span>
                            <h1 class="fw-bold mb-3">Shape your academic timeline</h1>
                            <p class="text-muted mb-4">
                                Add schools, degrees, and study periods so your portfolio tells a stronger story.
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-pill">Back to Dashboard</a>
                                <a href="#add-education" class="btn btn-dark btn-pill">Add Education</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-accent h-100 p-4 p-lg-5 d-flex flex-column justify-content-center">
                        <p class="text-uppercase small mb-2 text-white-50">Overview</p>
                        <h2 class="display-5 fw-bold mb-4">{{ $educations->count() }}</h2>
                        <div class="hero-stat">
                            <div class="small text-white-50 mb-1">Current entries</div>
                            <div class="fw-semibold">Education milestones ready to show on your portfolio</div>
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
                <div class="col-lg-4" id="add-education">
                    <div class="timeline-card h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-2">Add Education</h3>
                            <p class="text-muted mb-4">Fill in one study experience at a time.</p>

                            <form action="{{ route('education.addEdu') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="school" class="form-label fw-semibold">School</label>
                                    <input type="text" id="school" name="school" value="{{ old('school') }}" class="form-control @error('school') is-invalid @enderror" placeholder="University or training center">
                                    @error('school')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="degree" class="form-label fw-semibold">Degree</label>
                                    <input type="text" id="degree" name="degree" value="{{ old('degree') }}" class="form-control @error('degree') is-invalid @enderror" placeholder="Bachelor, Diploma, Certificate">
                                    @error('degree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="field_of_study" class="form-label fw-semibold">Field of Study</label>
                                    <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}" class="form-control @error('field_of_study') is-invalid @enderror" placeholder="Computer Science, Web Development">
                                    @error('field_of_study')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="start_date" class="form-label fw-semibold">Start Date</label>
                                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="end_date" class="form-label fw-semibold">End Date</label>
                                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark btn-pill w-100">Save Education</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    @if($educations->isEmpty())
                        <div class="empty-state h-100 d-flex flex-column justify-content-center align-items-center text-center p-5">
                            <h3 class="fw-bold mb-2">No education entries yet</h3>
                            <p class="text-muted mb-0">Start by adding your first school or course from the form on the left.</p>
                        </div>
                    @else
                        <div class="timeline-wrap">
                            <div class="row g-4">
                                @foreach($educations as $education)
                                    <div class="col-12">
                                        <div class="entry-card">
                                            <div class="card-body p-4 p-lg-4">
                                                <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-3">
                                                    <div>
                                                        <span class="tag-pill mb-3">Education</span>
                                                        <h4 class="fw-bold mb-1">{{ $education->school }}</h4>
                                                        <p class="text-muted mb-0">{{ $education->degree }} in {{ $education->field_of_study }}</p>
                                                    </div>

                                                    <div class="d-flex flex-column align-items-md-end gap-2">
                                                        <div class="text-muted small">
                                                            {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }}
                                                            -
                                                            {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('M Y') : 'Present' }}
                                                        </div>

                                                        <form action="{{ route('education.delete', $education->id) }}" method="POST" onsubmit="return confirm('Delete this education entry?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
