@extends('layouts.admin-modern')

@section('title', 'Projects')

@push('styles')
    <style>
        .project-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .project-card {
            padding: 24px;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.78);
            background: rgba(255, 255, 255, 0.78);
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
        }

        .project-mark {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(76, 121, 211, 0.12);
            color: var(--blue);
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 18px;
        }

        .project-desc {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
            min-height: 95px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        @media (max-width: 1040px) {
            .project-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 720px) {
            .project-grid {
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
                Projects Manager
            </span>
            <h1 class="hero-title">Manage your portfolio projects beautifully.</h1>
            <p class="hero-copy">
                Keep each project card complete with a clear title, a sharp description, and links that still work.
            </p>

            <div class="button-row">
                <a href="{{ route('admin.dashboard') }}" class="btn-light">Back to Dashboard</a>
                <a href="{{ route('project.create') }}" class="btn-main">Add Project</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current total</p>
            <h3 style="margin: 0 0 10px; font-size: 3rem;">{{ $projects->count() }}</h3>
            <p class="section-copy">Projects ready to showcase on your portfolio.</p>
        </div>
    </section>

    @if(session('success'))
        <div class="alert-box success">{{ session('success') }}</div>
    @endif

    @if($projects->count() > 0)
        <section class="project-grid">
            @foreach($projects as $p)
                <article class="project-card">
                    <div class="project-mark">{{ strtoupper(substr($p->title, 0, 1)) }}</div>
                    <h3 class="item-title">{{ $p->title }}</h3>
                    <p class="project-desc">{{ $p->description }}</p>

                    <div class="card-actions">
                        <a href="{{ route('projects.edit', $p->id) }}" class="btn-light">Edit</a>
                        <a href="{{ route('projects.delete', $p->id) }}" class="btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                    </div>
                </article>
            @endforeach
        </section>
    @else
        <section class="empty-state">
            <h3>No projects yet</h3>
            <p>Click Add Project to create your first portfolio project.</p>
            <div class="button-row" style="justify-content: center;">
                <a href="{{ route('project.create') }}" class="btn-secondary">Add Project</a>
            </div>
        </section>
    @endif
@endsection
