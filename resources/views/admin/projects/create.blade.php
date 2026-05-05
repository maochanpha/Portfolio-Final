@extends('layouts.admin-modern')

@section('title', 'Add Project')

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Project Creator
            </span>
            <h1 class="hero-title">Add a new project to your portfolio.</h1>
            <p class="hero-copy">
                Create a clean project entry with strong copy, useful links, and an image that supports the story.
            </p>

            <div class="button-row">
                <a href="{{ route('projects.index') }}" class="btn-light">Back to Projects</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">What to include</p>
            <p class="section-copy">Give the project a memorable title, explain what it does, and add links people can actually explore.</p>
        </div>
    </section>

    @if($errors->any())
        <div class="alert-box error">
            Please fix the following before saving:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="grid-2">
        <div class="surface-card">
            <div class="section-label">Project Form</div>
            <h2 class="section-title">Project details</h2>
            <p class="section-copy">Fill out the information below to add a new showcase item.</p>

            <form action="{{ route('addProject') }}" method="POST" enctype="multipart/form-data" style="margin-top: 24px;">
                @csrf

                <div class="field">
                    <label for="title">Project Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Example: Portfolio Website" required>
                </div>

                <div class="field">
                    <label for="description">Project Description</label>
                    <textarea id="description" name="description" placeholder="Write a short description about your project..." required>{{ old('description') }}</textarea>
                </div>

                <div class="field">
                    <label for="image">Project Image</label>
                    <input type="file" id="image" name="image">
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="demo">Demo Link</label>
                        <input type="text" id="demo" name="demo" value="{{ old('demo') }}" placeholder="https://your-demo-link.com">
                    </div>

                    <div class="field">
                        <label for="link">GitHub Link</label>
                        <input type="text" id="link" name="link" value="{{ old('link') }}" placeholder="https://github.com/username/project">
                    </div>
                </div>

                <div class="button-row">
                    <a href="{{ route('projects.index') }}" class="btn-ghost">Cancel</a>
                    <button class="btn-main" type="submit">Save Project</button>
                </div>
            </form>
        </div>

        <div class="side-card">
            <div class="section-label">Helpful Notes</div>
            <h2 class="section-title">Make the project easier to trust</h2>
            <p class="section-copy">A good project entry is not only visual. It also explains what the project is, why it matters, and where visitors can explore it.</p>

            <div class="stack-list" style="margin-top: 22px;">
                <div class="item-card">
                    <div>
                        <div class="tag blue">Title</div>
                        <p class="item-copy" style="margin-top: 12px;">Choose a short, specific title that visitors can understand quickly.</p>
                    </div>
                </div>
                <div class="item-card">
                    <div>
                        <div class="tag green">Description</div>
                        <p class="item-copy" style="margin-top: 12px;">Summarize the project clearly without turning it into a long paragraph.</p>
                    </div>
                </div>
                <div class="item-card">
                    <div>
                        <div class="tag amber">Links</div>
                        <p class="item-copy" style="margin-top: 12px;">If you include a demo or GitHub URL, make sure each link still opens correctly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
