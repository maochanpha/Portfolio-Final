<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Admin')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:500,700|dm-sans:400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #f4efe8;
            --surface: rgba(255, 255, 255, 0.84);
            --surface-strong: #ffffff;
            --surface-soft: #f8f4ee;
            --text: #1f2937;
            --muted: #6b7280;
            --line: rgba(31, 41, 55, 0.1);
            --accent: #d66a3d;
            --accent-deep: #a94922;
            --accent-soft: rgba(214, 106, 61, 0.12);
            --navy: #1f2937;
            --blue: #4c79d3;
            --green: #2f8f63;
            --purple: #8d5fd3;
            --amber: #c9822b;
            --rose: #b75a5a;
            --success: #0f766e;
            --error: #b42318;
            --shadow: 0 24px 70px rgba(43, 35, 27, 0.1);
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--text);
            font-family: "DM Sans", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(214, 106, 61, 0.18), transparent 22%),
                radial-gradient(circle at bottom right, rgba(93, 122, 185, 0.14), transparent 28%),
                linear-gradient(180deg, #fbf8f4 0%, #f4efe8 100%);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        .brand,
        .metric-value,
        .section-title,
        .hero-title {
            font-family: "Space Grotesk", sans-serif;
            letter-spacing: -0.03em;
        }

        .admin-shell {
            display: grid;
            grid-template-columns: 290px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            position: relative;
            padding: 28px 22px;
            background: linear-gradient(180deg, rgba(31, 41, 55, 0.98), rgba(55, 65, 81, 0.98));
            color: #fff;
            overflow: hidden;
        }

        .sidebar::before {
            content: "";
            position: absolute;
            inset: 18px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .sidebar-inner {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .brand-block {
            padding: 12px 10px 22px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 1.18rem;
            font-weight: 700;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }

        .sidebar-copy {
            margin: 14px 0 0;
            color: rgba(255, 255, 255, 0.68);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .nav-group {
            display: grid;
            gap: 10px;
            margin-top: 18px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 18px;
            color: rgba(255, 255, 255, 0.78);
            background: transparent;
            border: 1px solid transparent;
            transition: background 0.2s ease, transform 0.2s ease, border-color 0.2s ease;
        }

        .nav-link:hover,
        .nav-link:focus,
        .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.08);
            transform: translateX(3px);
        }

        .nav-label {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
        }

        .nav-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.08);
            font-size: 1rem;
        }

        .nav-arrow {
            opacity: 0.65;
            font-size: 0.95rem;
        }

        .sidebar-card {
            margin-top: auto;
            padding: 22px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-card h4 {
            margin: 0 0 10px;
            font-size: 1.12rem;
        }

        .sidebar-card p {
            margin: 0 0 18px;
            line-height: 1.7;
            font-size: 0.94rem;
            color: rgba(255, 255, 255, 0.72);
        }

        .sidebar-actions {
            display: grid;
            gap: 10px;
        }

        .ghost-link,
        .logout-btn {
            width: 100%;
            border-radius: 999px;
            padding: 12px 16px;
            font-weight: 700;
            text-align: center;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .ghost-link {
            background: #fff;
            color: var(--navy);
        }

        .logout-btn {
            border: 1px solid rgba(255, 255, 255, 0.16);
            background: transparent;
            color: #fff;
            cursor: pointer;
        }

        .ghost-link:hover,
        .ghost-link:focus,
        .logout-btn:hover,
        .logout-btn:focus {
            transform: translateY(-1px);
        }

        .logout-btn:hover,
        .logout-btn:focus {
            background: rgba(255, 255, 255, 0.08);
        }

        .main {
            padding: 28px;
        }

        .page-stack {
            display: grid;
            gap: 24px;
        }

        .page-hero,
        .surface-card,
        .metric-card,
        .item-card,
        .side-card,
        .preview-card {
            border-radius: var(--radius-lg);
            border: 1px solid rgba(255, 255, 255, 0.78);
            background: rgba(255, 255, 255, 0.78);
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
        }

        .page-hero {
            padding: 28px;
        }

        .split-hero {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 22px;
        }

        .hero-side {
            border-radius: var(--radius-lg);
            padding: 24px;
            color: #fff;
            background: linear-gradient(145deg, #1f2937 0%, #374151 100%);
            box-shadow: 0 22px 55px rgba(31, 41, 55, 0.16);
        }

        .section-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--accent-deep);
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .section-kicker-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
        }

        .hero-title {
            margin: 18px 0 10px;
            font-size: clamp(2.2rem, 4.5vw, 3.6rem);
            line-height: 0.96;
        }

        .hero-copy,
        .section-copy {
            margin: 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .hero-side .section-copy,
        .hero-side p {
            color: rgba(255, 255, 255, 0.72);
        }

        .button-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .btn-main,
        .btn-secondary,
        .btn-light,
        .btn-danger,
        .btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 999px;
            padding: 0.92rem 1.4rem;
            font-weight: 700;
            transition: transform 0.2s ease, opacity 0.2s ease, background 0.2s ease;
            border: 0;
            cursor: pointer;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-deep) 100%);
            color: #fff;
            box-shadow: 0 18px 32px rgba(169, 73, 34, 0.22);
        }

        .btn-secondary {
            background: #1f2937;
            color: #fff;
        }

        .btn-light {
            background: rgba(31, 41, 55, 0.06);
            color: var(--text);
            border: 1px solid rgba(31, 41, 55, 0.08);
        }

        .btn-danger {
            background: rgba(183, 90, 90, 0.12);
            color: var(--rose);
            border: 1px solid rgba(183, 90, 90, 0.16);
        }

        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border: 1px solid rgba(31, 41, 55, 0.08);
        }

        .btn-main:hover,
        .btn-secondary:hover,
        .btn-light:hover,
        .btn-danger:hover,
        .btn-ghost:hover,
        .btn-main:focus,
        .btn-secondary:focus,
        .btn-light:focus,
        .btn-danger:focus,
        .btn-ghost:focus {
            transform: translateY(-2px);
        }

        .grid-2,
        .grid-3 {
            display: grid;
            gap: 18px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .surface-card,
        .side-card,
        .preview-card {
            padding: 28px;
        }

        .metric-card {
            padding: 24px;
            position: relative;
            overflow: hidden;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .metric-card::before {
            content: "";
            position: absolute;
            inset: auto -40px -40px auto;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            opacity: 0.15;
            background: currentColor;
        }

        .metric-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .metric-label {
            color: var(--muted);
            font-size: 0.86rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .metric-icon {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.68);
            font-size: 1.2rem;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .metric-value {
            font-size: clamp(2.6rem, 5vw, 4rem);
            line-height: 0.92;
            margin: 20px 0 10px;
        }

        .metric-copy {
            margin: 0;
            color: rgba(31, 41, 55, 0.78);
            line-height: 1.7;
        }

        .metric-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
            font-weight: 700;
        }

        .tone-blue {
            color: var(--blue);
        }

        .tone-green {
            color: var(--green);
        }

        .tone-purple {
            color: var(--purple);
        }

        .tone-amber {
            color: var(--amber);
        }

        .tone-rose {
            color: var(--rose);
        }

        .section-label {
            color: var(--accent-deep);
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 1.7rem;
        }

        .alert-box {
            padding: 16px 18px;
            border-radius: 18px;
            font-size: 0.94rem;
            line-height: 1.6;
        }

        .alert-box.success {
            background: rgba(15, 118, 110, 0.1);
            border: 1px solid rgba(15, 118, 110, 0.18);
            color: var(--success);
        }

        .alert-box.error {
            background: rgba(180, 35, 24, 0.08);
            border: 1px solid rgba(180, 35, 24, 0.14);
            color: var(--error);
        }

        .alert-box ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .form-card form,
        .surface-card form {
            display: grid;
            gap: 18px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        .field-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .field label {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text);
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.96);
            color: var(--text);
            padding: 0.95rem 1rem;
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            outline: none;
            border-color: rgba(214, 106, 61, 0.55);
            box-shadow: 0 0 0 4px rgba(214, 106, 61, 0.12);
        }

        .field-help {
            color: var(--muted);
            font-size: 0.88rem;
        }

        .field-error {
            color: var(--error);
            font-size: 0.88rem;
        }

        .stack-list {
            display: grid;
            gap: 14px;
        }

        .item-card {
            padding: 22px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
        }

        .item-title {
            margin: 0 0 8px;
            font-size: 1.15rem;
        }

        .item-copy {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        .item-meta {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.6;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 0.9rem;
            border-radius: 999px;
            font-size: 0.84rem;
            font-weight: 700;
        }

        .tag.blue {
            background: rgba(76, 121, 211, 0.12);
            color: var(--blue);
        }

        .tag.green {
            background: rgba(47, 143, 99, 0.12);
            color: var(--green);
        }

        .tag.purple {
            background: rgba(141, 95, 211, 0.12);
            color: var(--purple);
        }

        .tag.amber {
            background: rgba(201, 130, 43, 0.12);
            color: var(--amber);
        }

        .tag.rose {
            background: rgba(183, 90, 90, 0.12);
            color: var(--rose);
        }

        .meta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 14px;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 0.85rem;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.05);
            color: #475569;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .empty-state {
            padding: 46px 28px;
            text-align: center;
            border-radius: var(--radius-lg);
            border: 2px dashed rgba(31, 41, 55, 0.14);
            background: rgba(255, 255, 255, 0.68);
        }

        .empty-state h3 {
            margin: 0 0 10px;
            font-size: 1.4rem;
        }

        .empty-state p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        @media (max-width: 1180px) {
            .admin-shell {
                grid-template-columns: 1fr;
            }

            .sidebar-card {
                margin-top: 0;
            }

            .sidebar-inner {
                gap: 18px;
            }

            .split-hero {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 880px) {
            .main {
                padding: 18px;
            }

            .grid-2,
            .grid-3,
            .field-row,
            .item-card {
                grid-template-columns: 1fr;
                flex-direction: column;
            }

            .surface-card,
            .side-card,
            .preview-card,
            .page-hero {
                padding: 22px;
            }

            .button-row {
                align-items: stretch;
            }

            .button-row a,
            .button-row button {
                width: 100%;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <div class="sidebar-inner">
                <div class="brand-block">
                    <a href="{{ route('admin.dashboard') }}" class="brand">
                        <span class="brand-mark">CM</span>
                        <span>Portfolio Admin</span>
                    </a>
                    <p class="sidebar-copy">
                        A calmer workspace for managing projects, skills, experience, education, and incoming messages.
                    </p>
                </div>

                <nav class="nav-group">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">01</span>
                            Dashboard
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                    <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') || request()->routeIs('project.*') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">02</span>
                            Projects
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                    <a href="{{ route('skills.index') }}" class="nav-link {{ request()->routeIs('skills.*') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">03</span>
                            Skills
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                    <a href="{{ route('education.index') }}" class="nav-link {{ request()->routeIs('education.*') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">04</span>
                            Education
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                    <a href="{{ route('experience.index') }}" class="nav-link {{ request()->routeIs('experience.*') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">05</span>
                            Experience
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                    <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                        <span class="nav-label">
                            <span class="nav-icon">06</span>
                            Messages
                        </span>
                        <span class="nav-arrow">-></span>
                    </a>
                </nav>

                <div class="sidebar-card">
                    <h4>Need a quick check?</h4>
                    <p>
                        Review the live portfolio before publishing updates so layout, copy, and links still feel polished.
                    </p>
                    <div class="sidebar-actions">
                        <a href="{{ url('/') }}" class="ghost-link">View Portfolio</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main">
            <div class="page-stack">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')
</body>

</html>
