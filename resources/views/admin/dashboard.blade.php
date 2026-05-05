@extends('layouts.admin-modern')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Admin Workspace
            </span>
            <h1 class="hero-title">Dashboard overview for your portfolio.</h1>
            <p class="hero-copy">
                Keep your content current, readable, and ready to present. This dashboard gives you a clear snapshot of what is live and where to jump next.
            </p>

            <div class="button-row">
                <a href="{{ route('projects.index') }}" class="btn-main">Manage Projects</a>
                <a href="{{ route('contacts.index') }}" class="btn-light">Review Messages</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Signed in as</p>
            <h3 style="margin: 0 0 8px; font-size: 1.5rem;">{{ Auth::user()->name }}</h3>
            <p class="section-copy" style="margin-bottom: 18px;">{{ Auth::user()->email }}</p>
            <div class="tag amber">Portfolio Admin</div>
        </div>
    </section>

    <section class="grid-2">
        <article class="metric-card tone-blue">
            <div class="metric-top">
                <div>
                    <div class="metric-label">Projects</div>
                    <div class="metric-value">{{ $projectCount }}</div>
                </div>
                <span class="metric-icon">P</span>
            </div>
            <div>
                <p class="metric-copy">Showcase your latest builds, update links, and keep each case study feeling complete.</p>
                <a href="{{ route('projects.index') }}" class="metric-link">Manage projects -></a>
            </div>
        </article>

        <article class="metric-card tone-green">
            <div class="metric-top">
                <div>
                    <div class="metric-label">Skills</div>
                    <div class="metric-value">{{ $skillCount }}</div>
                </div>
                <span class="metric-icon">S</span>
            </div>
            <div>
                <p class="metric-copy">Refresh your stack details so the portfolio reflects what you actually use now.</p>
                <a href="{{ route('skills.index') }}" class="metric-link">Manage skills -></a>
            </div>
        </article>

        <article class="metric-card tone-purple">
            <div class="metric-top">
                <div>
                    <div class="metric-label">Education</div>
                    <div class="metric-value">{{ $educationCount }}</div>
                </div>
                <span class="metric-icon">E</span>
            </div>
            <div>
                <p class="metric-copy">Keep your academic timeline and study background accurate and easy to scan.</p>
                <a href="{{ route('education.index') }}" class="metric-link">Manage education -></a>
            </div>
        </article>

        <article class="metric-card tone-amber">
            <div class="metric-top">
                <div>
                    <div class="metric-label">Messages</div>
                    <div class="metric-value">{{ $messageCount }}</div>
                </div>
                <span class="metric-icon">M</span>
            </div>
            <div>
                <p class="metric-copy">Check recent contact submissions and respond quickly when new opportunities arrive.</p>
                <a href="{{ route('contacts.index') }}" class="metric-link">View messages -></a>
            </div>
        </article>
    </section>

    <section class="grid-2">
        <div class="surface-card">
            <div class="section-label">Quick Actions</div>
            <h2 class="section-title">Jump straight into the part you want to refine.</h2>
            <p class="section-copy">
                Each area below takes you directly into a content section so you can make focused updates without hunting through menus.
            </p>

            <div class="stack-list" style="margin-top: 22px;">
                <a href="{{ route('projects.index') }}" class="item-card">
                    <div>
                        <div class="tag blue">Projects</div>
                        <h3 class="item-title" style="margin-top: 14px;">Manage projects</h3>
                        <p class="item-copy">Edit titles, descriptions, images, and links for your showcased work.</p>
                    </div>
                </a>

                <a href="{{ route('skills.index') }}" class="item-card">
                    <div>
                        <div class="tag green">Skills</div>
                        <h3 class="item-title" style="margin-top: 14px;">Manage skills</h3>
                        <p class="item-copy">Update your stack so the portfolio stays aligned with your current strengths.</p>
                    </div>
                </a>

                <a href="{{ route('education.index') }}" class="item-card">
                    <div>
                        <div class="tag purple">Education</div>
                        <h3 class="item-title" style="margin-top: 14px;">Manage education</h3>
                        <p class="item-copy">Keep your academic background and milestones clean and accurate.</p>
                    </div>
                </a>

                <a href="{{ route('contacts.index') }}" class="item-card">
                    <div>
                        <div class="tag amber">Inbox</div>
                        <h3 class="item-title" style="margin-top: 14px;">Review messages</h3>
                        <p class="item-copy">Check contact submissions and stay responsive to internship or project inquiries.</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="surface-card">
            <div class="section-label">Status Guide</div>
            <h2 class="section-title">What to review next</h2>
            <p class="section-copy">
                A small checklist to help you keep the admin side intentional instead of only functional.
            </p>

            <div class="stack-list" style="margin-top: 22px;">
                <div class="item-card">
                    <div>
                        <h3 class="item-title">Project quality</h3>
                        <p class="item-copy">Make sure each project has a clear title, strong description, and working links.</p>
                    </div>
                    <span class="tag blue">{{ $projectCount }} items</span>
                </div>

                <div class="item-card">
                    <div>
                        <h3 class="item-title">Skill clarity</h3>
                        <p class="item-copy">Trim vague entries and keep descriptions concise so they read confidently.</p>
                    </div>
                    <span class="tag green">{{ $skillCount }} items</span>
                </div>

                <div class="item-card">
                    <div>
                        <h3 class="item-title">Timeline accuracy</h3>
                        <p class="item-copy">Check start and end dates so the education story remains consistent.</p>
                    </div>
                    <span class="tag purple">{{ $educationCount }} items</span>
                </div>

                <div class="item-card">
                    <div>
                        <h3 class="item-title">Inbox follow-up</h3>
                        <p class="item-copy">Review messages regularly so potential opportunities do not sit unanswered.</p>
                    </div>
                    <span class="tag amber">{{ $messageCount }} items</span>
                </div>
            </div>
        </div>
    </section>
@endsection
