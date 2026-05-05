@extends('layouts.admin-modern')

@section('title', 'Experience')

@push('styles')
    <style>
        .experience-stack {
            position: relative;
            display: grid;
            gap: 16px;
            padding-left: 24px;
        }

        .experience-stack::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 7px;
            width: 3px;
            background: linear-gradient(180deg, #4c79d3 0%, #d8e4ff 100%);
            border-radius: 999px;
        }

        .experience-entry {
            position: relative;
        }

        .experience-entry::before {
            content: "";
            position: absolute;
            left: -22px;
            top: 26px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--blue);
            box-shadow: 0 0 0 6px rgba(76, 121, 211, 0.12);
        }
    </style>
@endpush

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Experience Manager
            </span>
            <h1 class="hero-title">Show your real work experience.</h1>
            <p class="hero-copy">
                Add internships, jobs, freelance roles, or practical work so your portfolio tells a stronger professional story.
            </p>

            <div class="button-row">
                <a href="{{ route('admin.dashboard') }}" class="btn-light">Back to Dashboard</a>
                <a href="#add-experience" class="btn-main">Add Experience</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current entries</p>
            <h3 style="margin: 0 0 10px; font-size: 3rem;">{{ $experiences->count() }}</h3>
            <p class="section-copy">Experience milestones ready to show on your portfolio.</p>
        </div>
    </section>

    @if(session('success'))
        <div class="alert-box success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-box error">
            Please fix the following:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="grid-2">
        <div class="surface-card" id="add-experience">
            <div class="section-label">Add Experience</div>
            <h2 class="section-title">Create one role at a time.</h2>
            <p class="section-copy">Keep the role, company, and timing clear so the section reads professionally.</p>

            <form action="{{ route('experience.add') }}" method="POST" style="margin-top: 24px;">
                @csrf

                <div class="field-row">
                    <div class="field">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Company or organization">
                        @error('company')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="position">Position</label>
                        <input type="text" id="position" name="position" value="{{ old('position') }}" placeholder="Frontend Intern, Web Developer">
                        @error('position')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="employment_type">Employment Type</label>
                        <input type="text" id="employment_type" name="employment_type" value="{{ old('employment_type') }}" placeholder="Internship, Freelance, Full-time">
                        @error('employment_type')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Phnom Penh, Remote">
                        @error('location')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Describe your responsibilities, results, or what you worked on">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                        <div class="field-help">The First Day of Work</div>
                        @error('start_date')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
                        <div class="field-help">Leave empty if you are still in this role.</div>
                        @error('end_date')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn-main">Save Experience</button>
            </form>
        </div>

        <div>
            @if($experiences->isEmpty())
                <div class="empty-state">
                    <h3>No experience entries yet</h3>
                    <p>Start by adding your first job, internship, or freelance role from the form on the left.</p>
                </div>
            @else
                <div class="experience-stack">
                    @foreach($experiences as $experience)
                        <article class="item-card experience-entry">
                            <div>
                                <div class="tag blue">Experience</div>
                                <h3 class="item-title" style="margin-top: 14px;">{{ $experience->position }}</h3>
                                <p class="item-copy">{{ $experience->company }}</p>

                                @if($experience->employment_type || $experience->location)
                                    <div class="item-meta" style="margin-top: 12px;">
                                        {{ collect([$experience->employment_type, $experience->location])->filter()->implode(' • ') }}
                                    </div>
                                @endif

                                <div class="item-meta" style="margin-top: 8px;">
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                                    -
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                </div>

                                @if($experience->description)
                                    <p class="item-copy" style="margin-top: 14px;">{{ $experience->description }}</p>
                                @endif
                            </div>

                            <form action="{{ route('experience.delete', $experience->id) }}" method="POST" onsubmit="return confirm('Delete this experience entry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
