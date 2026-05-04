<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChanPha Portfolio</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,700|dm-sans:400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg: #f4efe8;
            --surface: rgba(255, 255, 255, 0.8);
            --surface-strong: #ffffff;
            --surface-soft: #f8f4ee;
            --text: #1f2937;
            --muted: #6b7280;
            --line: rgba(31, 41, 55, 0.1);
            --accent: #d66a3d;
            --accent-deep: #a94922;
            --accent-soft: #fff1e8;
            --shadow: 0 24px 80px rgba(43, 35, 27, 0.08);
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--text);
            font-family: "DM Sans", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(214, 106, 61, 0.18), transparent 30%),
                radial-gradient(circle at bottom right, rgba(102, 153, 255, 0.14), transparent 28%),
                linear-gradient(180deg, #fbf8f4 0%, #f4efe8 100%);
        }

        h1, h2, h3, h4, h5, .brand, .stat-value {
            font-family: "Space Grotesk", sans-serif;
            letter-spacing: -0.03em;
        }

        a {
            text-decoration: none;
        }

        .page-shell {
            position: relative;
            overflow: hidden;
        }

        .page-shell::before,
        .page-shell::after {
            content: "";
            position: fixed;
            inset: auto;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.45;
            pointer-events: none;
            z-index: 0;
        }

        .page-shell::before {
            top: 72px;
            right: -120px;
            background: rgba(214, 106, 61, 0.18);
        }

        .page-shell::after {
            bottom: 80px;
            left: -140px;
            background: rgba(117, 151, 214, 0.18);
        }

        .section-space {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .glass-nav {
            margin: 18px auto 0;
            width: min(1120px, calc(100% - 24px));
            border: 1px solid rgba(255, 255, 255, 0.65);
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(18px);
            border-radius: 999px;
            box-shadow: 0 10px 35px rgba(31, 41, 55, 0.08);
        }

        .brand {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text);
        }

        .brand span {
            color: var(--accent);
        }

        .nav-link {
            color: var(--muted);
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: var(--text);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 0 72px;
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid rgba(214, 106, 61, 0.18);
            background: rgba(255, 255, 255, 0.72);
            color: var(--accent-deep);
            font-size: 0.9rem;
            font-weight: 700;
            box-shadow: 0 12px 30px rgba(214, 106, 61, 0.08);
        }

        .eyebrow-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
        }

        .hero-title {
            font-size: clamp(3rem, 6vw, 5.7rem);
            line-height: 0.95;
            margin: 22px 0 20px;
            max-width: 680px;
        }

        .text-accent {
            color: var(--accent);
        }

        .hero-copy {
            max-width: 600px;
            font-size: 1.08rem;
            line-height: 1.8;
            color: var(--muted);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .btn-main,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 24px;
            border-radius: 999px;
            font-weight: 700;
            transition: transform 0.22s ease, box-shadow 0.22s ease, background 0.22s ease, color 0.22s ease;
        }

        .btn-main {
            background: var(--text);
            color: #fff;
            box-shadow: 0 18px 32px rgba(31, 41, 55, 0.18);
        }

        .btn-main:hover,
        .btn-main:focus {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 22px 36px rgba(31, 41, 55, 0.22);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.72);
            color: var(--text);
            border: 1px solid rgba(31, 41, 55, 0.08);
        }

        .btn-secondary:hover,
        .btn-secondary:focus {
            color: var(--text);
            transform: translateY(-2px);
        }

        .hero-meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 42px;
        }

        .stat-card,
        .panel,
        .project-card,
        .timeline-card,
        .contact-card {
            border: 1px solid rgba(255, 255, 255, 0.7);
            background: var(--surface);
            backdrop-filter: blur(14px);
            box-shadow: var(--shadow);
        }

        .stat-card {
            padding: 22px;
            border-radius: var(--radius-lg);
        }

        .stat-value {
            display: block;
            font-size: 2rem;
            line-height: 1;
            margin-bottom: 10px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 0.95rem;
        }

        .profile-panel {
            position: relative;
            padding: 22px;
            border-radius: var(--radius-xl);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.78));
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 28px 90px rgba(43, 35, 27, 0.12);
        }

        .profile-panel::before {
            content: "";
            position: absolute;
            inset: 18px;
            border-radius: calc(var(--radius-xl) - 10px);
            border: 1px solid rgba(31, 41, 55, 0.06);
            pointer-events: none;
        }

        .profile-image {
            width: 100%;
            height: 560px;
            object-fit: cover;
            border-radius: calc(var(--radius-xl) - 8px);
            box-shadow: 0 18px 40px rgba(31, 41, 55, 0.12);
        }

        .floating-note {
            position: absolute;
            bottom: 36px;
            left: -24px;
            padding: 18px 20px;
            border-radius: 22px;
            background: rgba(31, 41, 55, 0.92);
            color: #fff;
            width: 220px;
            box-shadow: 0 20px 45px rgba(31, 41, 55, 0.22);
        }

        .floating-note small {
            color: rgba(255, 255, 255, 0.72);
            display: block;
            margin-bottom: 8px;
        }

        .section-heading {
            max-width: 640px;
            margin-bottom: 44px;
        }

        .section-kicker {
            color: var(--accent-deep);
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-size: 0.78rem;
            margin-bottom: 14px;
        }

        .section-title {
            font-size: clamp(2.3rem, 4vw, 3.6rem);
            line-height: 1;
            margin-bottom: 16px;
        }

        .section-copy {
            color: var(--muted);
            line-height: 1.8;
            font-size: 1rem;
        }

        .panel {
            height: 100%;
            padding: 28px;
            border-radius: var(--radius-lg);
        }

        .icon-chip {
            width: 56px;
            height: 56px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: var(--accent-soft);
            color: var(--accent);
            font-size: 1.25rem;
            margin-bottom: 18px;
        }

        .panel h5 {
            font-size: 1.15rem;
            margin-bottom: 10px;
        }

        .panel p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        .about-highlight {
            padding: 30px;
            border-radius: var(--radius-xl);
            background: linear-gradient(135deg, #1f2937 0%, #384355 100%);
            color: #fff;
            box-shadow: 0 24px 60px rgba(31, 41, 55, 0.18);
        }

        .about-highlight p {
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 0;
            line-height: 1.8;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 18px;
        }

        .skill-card {
            grid-column: span 4;
            padding: 24px;
            border-radius: 22px;
            border: 1px solid rgba(31, 41, 55, 0.08);
            background: rgba(255, 255, 255, 0.82);
            box-shadow: 0 20px 45px rgba(31, 41, 55, 0.06);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .skill-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 24px 52px rgba(31, 41, 55, 0.08);
        }

        .skill-index {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 14px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--accent-deep);
            font-weight: 700;
            margin-bottom: 16px;
        }

        .skill-card h5,
        .project-card h5,
        .timeline-card h5,
        .contact-card h5 {
            margin-bottom: 10px;
            font-size: 1.12rem;
        }

        .skill-card p,
        .project-card p,
        .timeline-card p,
        .contact-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .timeline-stack {
            display: grid;
            gap: 18px;
        }

        .timeline-card {
            padding: 26px 28px;
            border-radius: 24px;
            position: relative;
            overflow: hidden;
        }

        .timeline-card::before {
            content: "";
            position: absolute;
            top: 28px;
            left: 0;
            width: 4px;
            height: calc(100% - 56px);
            background: linear-gradient(180deg, var(--accent) 0%, rgba(214, 106, 61, 0.12) 100%);
            border-radius: 999px;
        }

        .timeline-content {
            padding-left: 22px;
        }

        .timeline-date {
            display: inline-flex;
            padding: 8px 14px;
            border-radius: 999px;
            background: var(--surface-soft);
            color: var(--accent-deep);
            font-size: 0.86rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 22px;
        }

        .project-card {
            grid-column: span 4;
            border-radius: 28px;
            overflow: hidden;
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 28px 65px rgba(31, 41, 55, 0.12);
        }

        .project-media {
            height: 240px;
            background:
                linear-gradient(135deg, rgba(214, 106, 61, 0.15), rgba(75, 111, 175, 0.15)),
                #efe8df;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-deep);
        }

        .project-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-fallback-icon {
            font-size: 3rem;
            opacity: 0.65;
        }

        .project-body {
            padding: 26px;
        }

        .project-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .mini-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            background: var(--surface-soft);
            color: var(--text);
            font-weight: 700;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .mini-link:hover,
        .mini-link:focus {
            background: #ece4d9;
            color: var(--text);
            transform: translateY(-1px);
        }

        .contact-wrap {
            padding: 42px;
            border-radius: 34px;
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.96), rgba(47, 58, 74, 0.92));
            color: #fff;
            box-shadow: 0 28px 80px rgba(31, 41, 55, 0.2);
        }

        .contact-wrap .section-copy,
        .contact-wrap p {
            color: rgba(255, 255, 255, 0.74);
        }

        .contact-card {
            padding: 24px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.12);
            box-shadow: none;
        }

        .contact-form-card {
            padding: 0;
            border-radius: 28px;
            background: #ffffff;
            border: 1px solid rgba(31, 41, 55, 0.08);
            overflow: hidden;
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.12);
        }

        .contact-form-card .form-label {
            color: var(--text);
            font-weight: 700;
            margin-bottom: 0.55rem;
        }

        .contact-input,
        .contact-input:focus {
            border: 1px solid rgba(31, 41, 55, 0.12);
            background: #ffffff;
            color: var(--text);
            border-radius: 18px;
            padding: 0.9rem 1rem;
            box-shadow: none;
        }

        textarea.contact-input {
            min-height: 150px;
            resize: vertical;
        }

        .contact-alert {
            border: 0;
            border-radius: 22px;
            padding: 16px 18px;
            margin-top: 22px;
        }

        .contact-link {
            color: #fff;
            font-weight: 700;
        }

        .contact-link:hover,
        .contact-link:focus {
            color: #fff;
            text-decoration: underline;
        }

        .footer-note {
            padding: 28px 0 42px;
            text-align: center;
            color: var(--muted);
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .empty-card {
            padding: 32px;
            border-radius: 26px;
            border: 1px dashed rgba(31, 41, 55, 0.16);
            background: rgba(255, 255, 255, 0.55);
            color: var(--muted);
        }

        @media (max-width: 991.98px) {
            .glass-nav {
                width: calc(100% - 16px);
                border-radius: 28px;
            }

            .hero {
                min-height: auto;
                padding-top: 128px;
            }

            .hero-meta,
            .skills-grid,
            .projects-grid {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .skill-card,
            .project-card {
                grid-column: auto;
            }

            .profile-image {
                height: 440px;
            }

            .floating-note {
                position: static;
                width: 100%;
                margin-top: 16px;
            }
        }

        @media (max-width: 767.98px) {
            .section-space {
                padding: 82px 0;
            }

            .hero-title {
                font-size: clamp(2.6rem, 13vw, 4rem);
            }

            .hero-copy,
            .section-copy,
            .panel p,
            .skill-card p,
            .project-card p,
            .timeline-card p {
                font-size: 0.98rem;
            }

            .hero-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-main,
            .btn-secondary {
                width: 100%;
            }

            .profile-panel,
            .contact-wrap {
                padding: 22px;
            }

            .timeline-card,
            .panel,
            .project-body,
            .skill-card,
            .contact-card {
                padding: 22px;
            }
        }
    </style>
</head>
<body>
<div class="page-shell">
    <nav class="navbar navbar-expand-lg fixed-top glass-nav">
        <div class="container px-3 px-lg-4">
            <a class="navbar-brand brand" href="#home">Mao ChanPha<span>.</span></a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3 py-3 py-lg-0">
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#skills" class="nav-link">Skills</a></li>
                    <li class="nav-item"><a href="#education" class="nav-link">Education</a></li>
                    <li class="nav-item"><a href="#projects" class="nav-link">Projects</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="eyebrow">
                        <span class="eyebrow-dot"></span>
                        Laravel Developer
                    </span>

                    <h1 class="hero-title">
                        Building <span class="text-accent">clean</span>, modern websites with purpose.
                    </h1>

                    <p class="hero-copy">
                        I'm ChanPha, a Computer Science student focused on Laravel, PHP, MySQL, and responsive frontend work. I enjoy turning ideas into polished, user-friendly experiences that feel simple and thoughtful.
                    </p>

                    <div class="hero-actions">
                        <a href="#projects" class="btn-main">
                            <i class="bi bi-grid"></i>
                            View Projects
                        </a>
                        <a href="#contact" class="btn-secondary">
                            <i class="bi bi-send"></i>
                            Let's Connect
                        </a>
                    </div>

                    <div class="hero-meta">
                        <div class="stat-card">
                            <span class="stat-value">{{ $projects->count() }}</span>
                            <span class="stat-label">Projects showcased</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">{{ $skills->count() }}</span>
                            <span class="stat-label">Skills in my stack</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">{{ $educations->count() }}</span>
                            <span class="stat-label">Education milestones</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="profile-panel">
                        <img src="{{ asset('images/81T0GmGsrZL.jpg') }}" class="profile-image" alt="Portrait of ChanPha">
                        <div class="floating-note">
                            <small>Current focus</small>
                            Building responsive Laravel portfolio and CRUD experiences with clean UI details.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section-space pt-0">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <div class="section-heading mb-0">
                        <div class="section-kicker">About Me</div>
                        <h2 class="section-title">A clean interface starts with clear thinking.</h2>
                        <p class="section-copy">
                            I study Computer Science at Western University Cambodia and enjoy designing websites that feel modern, readable, and easy to use. My goal is to keep things visually strong without making them complicated.
                        </p>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="icon-chip"><i class="bi bi-code-slash"></i></div>
                                <h5>Development</h5>
                                <p>Laravel, PHP, MySQL, and practical full-stack problem solving for portfolio and business websites.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel">
                                <div class="icon-chip"><i class="bi bi-phone"></i></div>
                                <h5>Responsive UI</h5>
                                <p>Layouts that stay elegant across desktop, tablet, and mobile without feeling crowded or fragile.</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="about-highlight">
                                <h5 class="mb-3">What I care about</h5>
                                <p>Readable structure, balanced spacing, fast-loading pages, and interfaces that help people understand what matters right away.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="section-space">
        <div class="container">
            <div class="section-heading">
                <div class="section-kicker">Skills</div>
                <h2 class="section-title">Tools I use to build polished web experiences.</h2>
                <p class="section-copy">
                    A focused stack helps me move faster and keep the final product stable, maintainable, and easy to improve.
                </p>
            </div>

            @if($skills->isNotEmpty())
                <div class="skills-grid">
                    @foreach($skills as $skill)
                        <div class="skill-card">
                            <div class="skill-index">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                            <h5>{{ $skill->name }}</h5>
                            <p>{{ $skill->description ?: 'A core part of my development toolkit for building reliable web projects.' }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    Skills will appear here once they are added from the admin panel.
                </div>
            @endif
        </div>
    </section>

    <section id="education" class="section-space pt-0">
        <div class="container">
            <div class="section-heading">
                <div class="section-kicker">Education</div>
                <h2 class="section-title">The foundation behind my work.</h2>
                <p class="section-copy">
                    My academic path continues to shape how I approach software, structure problems, and improve my craft.
                </p>
            </div>

            @if($educations->isNotEmpty())
                <div class="timeline-stack">
                    @foreach($educations as $education)
                        <div class="timeline-card">
                            <div class="timeline-content">
                                <div class="timeline-date">
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }}
                                    -
                                    {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('M Y') : 'Present' }}
                                </div>
                                <h5>{{ $education->school }}</h5>
                                <p>{{ $education->degree }} in {{ $education->field_of_study }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    Education details will appear here when records are available.
                </div>
            @endif
        </div>
    </section>

    <section id="projects" class="section-space pt-0">
        <div class="container">
            <div class="section-heading">
                <div class="section-kicker">Projects</div>
                <h2 class="section-title">Selected work with a cleaner visual story.</h2>
                <p class="section-copy">
                    A few examples of projects I've built, from database-driven applications to portfolio-style interfaces.
                </p>
            </div>

            @if($projects->isNotEmpty())
                <div class="projects-grid">
                    @foreach($projects as $project)
                        <article class="project-card">
                            <div class="project-media">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                                @else
                                    <i class="bi bi-window project-fallback-icon"></i>
                                @endif
                            </div>

                            <div class="project-body">
                                <h5>{{ $project->title }}</h5>
                                <p>{{ $project->description ?: 'Project details will be added soon.' }}</p>

                                @if($project->demo || $project->link)
                                    <div class="project-links">
                                        @if($project->demo)
                                            <a href="{{ $project->demo }}" target="_blank" rel="noopener noreferrer" class="mini-link">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                                Live Demo
                                            </a>
                                        @endif

                                        @if($project->link)
                                            <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="mini-link">
                                                <i class="bi bi-github"></i>
                                                Source Code
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-card">
                    Projects will appear here after they are added from the admin dashboard.
                </div>
            @endif
        </div>
    </section>

    <section id="contact" class="section-space pt-0">
        <div class="container">
            <div class="contact-wrap">
                @if(session('success'))
                    <div class="alert alert-success contact-alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('warning'))
                    <div class="alert alert-warning contact-alert">
                        {{ session('warning') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger contact-alert">
                        <strong>Please check your contact form:</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-5">
                        <div class="section-heading mb-0">
                            <div class="section-kicker text-white-50">Contact</div>
                            <h2 class="section-title mb-3">Let's build something thoughtful together.</h2>
                            <p class="section-copy">
                                If you have a project, internship, or collaboration in mind, I'd be happy to connect and talk through it.
                            </p>
                        </div>

                        <div class="hero-actions mt-4">
                            <a href="mailto:maochanpha@gmail.com" class="btn-main">
                                <i class="bi bi-envelope"></i>
                                Email Me
                            </a>
                            <a href="#home" class="btn-secondary">
                                <i class="bi bi-arrow-up-right"></i>
                                Back to Top
                            </a>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <div class="contact-card h-100">
                                    <div class="icon-chip bg-white text-dark"><i class="bi bi-envelope-paper"></i></div>
                                    <h5>Email</h5>
                                    <p>Best for project discussions and opportunities.</p>
                                    <a href="mailto:maochanpha@gmail.com" class="contact-link">maochanpha@gmail.com</a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contact-card h-100">
                                    <div class="icon-chip bg-white text-dark"><i class="bi bi-telephone"></i></div>
                                    <h5>Phone</h5>
                                    <p>Available for direct contact when needed.</p>
                                    <a href="tel:0963399779" class="contact-link">0963399779</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="contact-card">
                                    <div class="icon-chip bg-white text-dark"><i class="bi bi-stars"></i></div>
                                    <h5>What you can expect</h5>
                                    <p>A calm workflow, clean implementation, and strong attention to detail from layout to final polish.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form-card h-100 bg-white">
                            <div class="p-4 p-lg-5 text-dark">
                                <form action="{{ route('contact') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label fw-semibold">Your Name</label>
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                            class="form-control contact-input @error('name') is-invalid @enderror"
                                            placeholder="Enter your name"
                                            required
                                        >
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label fw-semibold">Your Email</label>
                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            class="form-control contact-input @error('email') is-invalid @enderror"
                                            placeholder="Enter your email"
                                            required
                                        >
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                        <label for="message" class="form-label fw-semibold">Message</label>
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="6"
                                            class="form-control contact-input @error('message') is-invalid @enderror"
                                            placeholder="Write your message here..."
                                            required
                                        >{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        </div>

                                        <div class="col-12">
                                        <button type="submit" class="btn btn-main border-0">
                                            <i class="bi bi-send me-2"></i>
                                            Send Message
                                        </button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-note">
        <div class="container">
            &copy; 2026 ChanPha Mao. All rights reserved.
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
