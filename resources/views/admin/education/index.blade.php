@extends('layouts.admin-modern')

@section('title', 'Education')

@push('styles')
    <style>
        .timeline-stack {
            position: relative;
            display: grid;
            gap: 16px;
            padding-left: 24px;
        }

        .timeline-stack::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 7px;
            width: 3px;
            background: linear-gradient(180deg, #a855f7 0%, #e9d5ff 100%);
            border-radius: 999px;
        }

        .timeline-entry {
            position: relative;
        }

        .timeline-entry::before {
            content: "";
            position: absolute;
            left: -22px;
            top: 26px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--purple);
            box-shadow: 0 0 0 6px rgba(141, 95, 211, 0.12);
        }
    </style>
@endpush

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Education Manager
            </span>
            <h1 class="hero-title">Shape your academic timeline.</h1>
            <p class="hero-copy">
                Add schools, degrees, and study periods so your portfolio tells a stronger story.
            </p>

            <div class="button-row">
                <a href="{{ route('admin.dashboard') }}" class="btn-light">Back to Dashboard</a>
                <a href="#add-education" class="btn-secondary">Add Education</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current entries</p>
            <h3 style="margin: 0 0 10px; font-size: 3rem;">{{ $educations->count() }}</h3>
            <p class="section-copy">Education milestones ready to show on your portfolio.</p>
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
        <div class="surface-card" id="add-education">
            <div class="section-label">Add Education</div>
            <h2 class="section-title">Fill in one study experience at a time.</h2>
            <p class="section-copy">Small, accurate entries make the timeline more trustworthy and easier to scan.</p>

            <form action="{{ route('education.addEdu') }}" method="POST" style="margin-top: 24px;">
                @csrf

                <div class="field">
                    <label for="school">School</label>
                    <input type="text" id="school" name="school" value="{{ old('school') }}" placeholder="University or training center">
                    @error('school')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="degree">Degree</label>
                        <input type="text" id="degree" name="degree" value="{{ old('degree') }}" placeholder="Bachelor, Diploma, Certificate">
                        @error('degree')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="field_of_study">Field of Study</label>
                        <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}" placeholder="Computer Science, Web Development">
                        @error('field_of_study')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn-main">Save Education</button>
            </form>
        </div>

        <div>
            @if($educations->isEmpty())
                <div class="empty-state">
                    <h3>No education entries yet</h3>
                    <p>Start by adding your first school or course from the form on the left.</p>
                </div>
            @else
                <div class="timeline-stack">
                    @foreach($educations as $education)
                        <article class="item-card timeline-entry">
                            <div>
                                <div class="tag purple">Education</div>
                                <h3 class="item-title" style="margin-top: 14px;">{{ $education->school }}</h3>
                                <p class="item-copy">{{ $education->degree }} in {{ $education->field_of_study }}</p>
                                <div class="item-meta" style="margin-top: 12px;">
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }}
                                    -
                                    {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('M Y') : 'Present' }}
                                </div>
                            </div>

                            <form action="{{ route('education.delete', $education->id) }}" method="POST" onsubmit="return confirm('Delete this education entry?');">
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
