@extends('layouts.admin-modern')

@section('title', 'Skills')

@push('styles')
    <style>
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        @media (max-width: 760px) {
            .skills-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Skills Manager
            </span>
            <h1 class="hero-title">Build your tech stack section.</h1>
            <p class="hero-copy">
                Add the tools, frameworks, and strengths you want visitors to see on your portfolio.
            </p>

            <div class="button-row">
                <a href="{{ route('admin.dashboard') }}" class="btn-light">Back to Dashboard</a>
                <a href="#add-skill" class="btn-main">Add New Skill</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current total</p>
            <h3 style="margin: 0 0 10px; font-size: 3rem;">{{ $skills->count() }}</h3>
            <p class="section-copy">Skills ready for your portfolio showcase.</p>
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
        <div class="surface-card" id="add-skill">
            <div class="section-label">Add a Skill</div>
            <h2 class="section-title">Create a short, clear entry.</h2>
            <p class="section-copy">Keep the wording specific so the stack section reads confidently.</p>

            <form action="{{ route('skills.addSkill') }}" method="POST" style="margin-top: 24px;">
                @csrf

                <div class="field">
                    <label for="name">Skill Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Laravel, React, MySQL...">
                    @error('name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Briefly describe what you use this skill for">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-main">Save Skill</button>
            </form>
        </div>

        <div>
            @if($skills->isEmpty())
                <div class="empty-state">
                    <h3>No skills added yet</h3>
                    <p>Start by adding your first skill from the form on the left.</p>
                </div>
            @else
                <div class="skills-grid">
                    @foreach($skills as $skill)
                        <article class="item-card" style="height: 100%;">
                            <div>
                                <div class="tag green">Skill</div>
                                <h3 class="item-title" style="margin-top: 14px;">{{ $skill->name }}</h3>
                                <p class="item-copy">{{ $skill->desccription ?: ($skill->description ?? 'No description added yet.') }}</p>
                            </div>

                            <form action="{{ route('skills.delete', $skill->id) }}" method="POST" onsubmit="return confirm('Delete this skill?');">
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
