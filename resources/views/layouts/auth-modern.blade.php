<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Authentication')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:500,700|dm-sans:400,500,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #f4efe8;
            --surface: rgba(255, 255, 255, 0.86);
            --surface-soft: #f8f4ee;
            --text: #1f2937;
            --muted: #6b7280;
            --line: rgba(31, 41, 55, 0.12);
            --accent: #d66a3d;
            --accent-deep: #a94922;
            --accent-soft: rgba(214, 106, 61, 0.12);
            --success: #0f766e;
            --error: #b42318;
            --shadow: 0 30px 90px rgba(43, 35, 27, 0.12);
            --radius-xl: 34px;
            --radius-lg: 26px;
            --radius-md: 18px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(214, 106, 61, 0.18), transparent 24%),
                radial-gradient(circle at bottom right, rgba(106, 145, 214, 0.16), transparent 26%),
                linear-gradient(180deg, #fbf8f4 0%, #f4efe8 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        .brand,
        .metric-value,
        .form-title {
            font-family: "Space Grotesk", sans-serif;
            letter-spacing: -0.03em;
        }

        .auth-page {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
            overflow: hidden;
        }

        .auth-page::before,
        .auth-page::after {
            content: "";
            position: absolute;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            filter: blur(48px);
            opacity: 0.42;
            pointer-events: none;
        }

        .auth-page::before {
            top: -80px;
            left: -80px;
            background: rgba(214, 106, 61, 0.22);
        }

        .auth-page::after {
            right: -100px;
            bottom: -100px;
            background: rgba(92, 131, 201, 0.2);
        }

        .auth-shell {
            position: relative;
            z-index: 1;
            width: min(1160px, 100%);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            border-radius: 38px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
            background: rgba(255, 255, 255, 0.5);
        }

        .hero-panel {
            position: relative;
            padding: 42px;
            background:
                linear-gradient(145deg, rgba(31, 41, 55, 0.96), rgba(59, 69, 83, 0.93)),
                #1f2937;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 720px;
        }

        .hero-panel::before {
            content: "";
            position: absolute;
            inset: 20px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .brand-row,
        .hero-copy-wrap,
        .hero-footer {
            position: relative;
            z-index: 1;
        }

        .brand-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.14);
            color: #fff;
            font-weight: 700;
        }

        .back-link {
            padding: 12px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.92rem;
            font-weight: 600;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .back-link:hover,
        .back-link:focus {
            background: rgba(255, 255, 255, 0.14);
            transform: translateY(-1px);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.12);
            font-size: 0.86rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .eyebrow-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #f3a683;
            box-shadow: 0 0 0 6px rgba(243, 166, 131, 0.12);
        }

        .hero-title {
            margin: 24px 0 18px;
            font-size: clamp(3rem, 5.6vw, 5.3rem);
            line-height: 0.94;
            max-width: 540px;
        }

        .hero-title span {
            color: #f3a683;
        }

        .hero-text {
            max-width: 520px;
            font-size: 1.04rem;
            line-height: 1.85;
            color: rgba(255, 255, 255, 0.72);
        }

        .hero-metrics {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 34px;
        }

        .metric-card {
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .metric-value {
            display: block;
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .metric-label {
            font-size: 0.92rem;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.68);
        }

        .hero-note {
            padding: 22px 24px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.74);
            line-height: 1.75;
        }

        .form-panel {
            padding: 38px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            width: min(460px, 100%);
        }

        .form-topline {
            color: var(--accent-deep);
            font-size: 0.84rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 14px;
        }

        .form-title {
            font-size: clamp(2.1rem, 4vw, 3rem);
            line-height: 1;
            margin: 0 0 14px;
        }

        .form-copy {
            margin: 0 0 28px;
            color: var(--muted);
            line-height: 1.75;
        }

        .status-box,
        .error-box {
            padding: 16px 18px;
            border-radius: 18px;
            margin-bottom: 18px;
            font-size: 0.94rem;
            line-height: 1.6;
        }

        .status-box {
            background: rgba(15, 118, 110, 0.1);
            border: 1px solid rgba(15, 118, 110, 0.18);
            color: var(--success);
        }

        .error-box {
            background: rgba(180, 35, 24, 0.08);
            border: 1px solid rgba(180, 35, 24, 0.14);
            color: var(--error);
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
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
            min-height: 130px;
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
            margin-top: 8px;
            color: var(--muted);
            font-size: 0.88rem;
        }

        .field-error {
            margin-top: 8px;
            color: var(--error);
            font-size: 0.9rem;
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin: 10px 0 28px;
        }

        .remember {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .remember input {
            width: 18px;
            height: 18px;
            accent-color: var(--accent);
        }

        .sub-link {
            color: var(--accent-deep);
            font-size: 0.94rem;
            font-weight: 700;
        }

        .sub-link:hover,
        .sub-link:focus {
            text-decoration: underline;
        }

        .submit-btn,
        .secondary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 999px;
            padding: 1rem 1.2rem;
            font-size: 0.96rem;
            font-weight: 700;
            transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
        }

        .submit-btn {
            width: 100%;
            border: 0;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-deep) 100%);
            color: #fff;
            cursor: pointer;
            box-shadow: 0 18px 32px rgba(169, 73, 34, 0.22);
        }

        .secondary-btn {
            background: rgba(31, 41, 55, 0.06);
            color: var(--text);
            border: 1px solid rgba(31, 41, 55, 0.08);
        }

        .submit-btn:hover,
        .submit-btn:focus,
        .secondary-btn:hover,
        .secondary-btn:focus {
            transform: translateY(-2px);
        }

        .submit-btn:focus,
        .secondary-btn:focus {
            outline: none;
        }

        .inline-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .form-footer {
            margin-top: 22px;
            text-align: center;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .form-footer a {
            color: var(--text);
            font-weight: 700;
        }

        .form-footer a:hover,
        .form-footer a:focus {
            text-decoration: underline;
        }

        @media (max-width: 1080px) {
            .auth-shell {
                grid-template-columns: 1fr;
            }

            .hero-panel {
                min-height: auto;
                gap: 36px;
            }
        }

        @media (max-width: 767.98px) {
            .auth-page {
                padding: 16px;
            }

            .hero-panel,
            .form-panel {
                padding: 24px;
            }

            .brand-row,
            .form-row,
            .inline-actions,
            .field-grid {
                grid-template-columns: 1fr;
                flex-direction: column;
                align-items: stretch;
            }

            .hero-metrics {
                grid-template-columns: 1fr;
            }

            .back-link {
                text-align: center;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <main class="auth-page">
        <section class="auth-shell">
            <aside class="hero-panel">
                <div class="brand-row">
                    <a href="{{ url('/') }}" class="brand">
                        <span class="brand-mark">CM</span>
                        <span>ChanPha Portfolio</span>
                    </a>

                    <a href="{{ url('/') }}" class="back-link">Back to Portfolio</a>
                </div>

                <div class="hero-copy-wrap">
                    <span class="eyebrow">
                        <span class="eyebrow-dot"></span>
                        @yield('hero_kicker', 'Portfolio Access')
                    </span>

                    <h1 class="hero-title">@yield('hero_title')</h1>
                    <p class="hero-text">@yield('hero_text')</p>

                    @hasSection('hero_metrics')
                        <div class="hero-metrics">
                            @yield('hero_metrics')
                        </div>
                    @endif
                </div>

                <div class="hero-footer">
                    <div class="hero-note">
                        @yield('hero_note', 'A focused, consistent workspace for managing content and keeping the portfolio presentation polished.')
                    </div>
                </div>
            </aside>

            <div class="form-panel">
                <div class="form-card">
                    <div class="form-topline">@yield('form_kicker', 'Portfolio Admin')</div>
                    <h2 class="form-title">@yield('form_title')</h2>
                    <p class="form-copy">@yield('form_copy')</p>

                    @yield('content')

                    @hasSection('form_footer')
                        <div class="form-footer">
                            @yield('form_footer')
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
    @stack('scripts')
</body>

</html>
