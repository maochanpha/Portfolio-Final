@extends('layouts.admin-modern')

@section('title', 'Edit Project')

@push('styles')
    <style>
        .preview-media {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.08);
        }

        .preview-placeholder {
            height: 240px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.72);
        }
    </style>
@endpush

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Project Editor
            </span>
            <h1 class="hero-title">Update your project details.</h1>
            <p class="hero-copy">
                Refresh the content, links, and image shown in your portfolio so this project still feels current and complete.
            </p>

            <div class="button-row">
                <a href="{{ route('projects.index') }}" class="btn-light">Back to Projects</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current item</p>
            <h3 style="margin: 0 0 10px; font-size: 1.8rem;">{{ $project->title }}</h3>
            <p class="section-copy">What visitors currently see in your portfolio.</p>
        </div>
    </section>

    @if ($errors->any())
        <div class="alert-box error">
            Please fix the following:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert-box success">{{ session('success') }}</div>
    @endif

    <section class="grid-2">
        <div class="surface-card">
            <div class="section-label">Edit Information</div>
            <h2 class="section-title">Project form</h2>
            <p class="section-copy">Keep the content clear and make sure your links still work.</p>

            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" style="margin-top: 24px;">
                @csrf

                <div class="field">
                    <label for="title">Project Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" placeholder="Enter project title">
                    @error('title')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Write a short overview of the project">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="demo">Demo Link</label>
                        <input type="text" id="demo" name="demo" value="{{ old('demo', $project->demo) }}" placeholder="https://demo.com">
                        @error('demo')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="link">GitHub Link</label>
                        <input type="text" id="link" name="link" value="{{ old('link', $project->link) }}" placeholder="https://github.com/username/repo">
                        @error('link')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="image">Replace Image</label>
                    <input type="file" id="image" name="image">
                    <div class="field-help">Leave this empty if you want to keep the current image.</div>
                    @error('image')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-row">
                    <button type="submit" class="btn-main">Update Project</button>
                    <a href="{{ route('projects.index') }}" class="btn-ghost">Cancel</a>
                </div>
            </form>
        </div>

        <div class="preview-card" style="background: linear-gradient(145deg, #1f2937 0%, #374151 100%); color: #fff;">
            <div class="section-label" style="color: rgba(255,255,255,0.7);">Current Preview</div>
            <h2 class="section-title" style="color: #fff;">{{ $project->title }}</h2>
            <p class="section-copy">{{ $project->description }}</p>

            <div style="margin-top: 20px;">
                @if ($project->image)
                    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="preview-media">
                @else
                    <div class="preview-placeholder">No image uploaded</div>
                @endif
            </div>

            <div class="stack-list" style="margin-top: 20px;">
                <div class="item-card" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.08);">
                    <div>
                        <div class="tag amber">Demo</div>
                        <p class="item-copy" style="color: rgba(255,255,255,0.72); margin-top: 12px;">{{ $project->demo ?: 'Not provided' }}</p>
                    </div>
                </div>
                <div class="item-card" style="background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.08);">
                    <div>
                        <div class="tag blue">GitHub</div>
                        <p class="item-copy" style="color: rgba(255,255,255,0.72); margin-top: 12px;">{{ $project->link ?: 'Not provided' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
