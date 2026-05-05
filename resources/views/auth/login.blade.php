@extends('layouts.auth-modern')

@section('title', 'Login')
@section('hero_kicker', 'Admin Access')
@section('hero_title')
    Welcome back to your <span>creative workspace</span>.
@endsection
@section('hero_text', 'Sign in to manage projects, update skills, and keep your portfolio presentation polished, current, and ready to share.')
@section('hero_note', 'Keep the portfolio feeling sharp with small updates, better project stories, and a login screen that matches the rest of the site.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Log in')
@section('form_copy', 'Enter your account details to continue managing your portfolio content.')

@section('hero_metrics')
    <div class="metric-card">
        <span class="metric-value">Clean</span>
        <span class="metric-label">Focused dashboard access without extra clutter.</span>
    </div>
    <div class="metric-card">
        <span class="metric-value">Fast</span>
        <span class="metric-label">Quick route back into editing portfolio content.</span>
    </div>
    <div class="metric-card">
        <span class="metric-value">Secure</span>
        <span class="metric-label">Standard Laravel authentication flow preserved.</span>
    </div>
@endsection

@section('content')
    @if (session('status'))
        <div class="status-box">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-box">
            Please review the highlighted fields and try again.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Email Address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password">
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="remember_me" class="remember">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="sub-link">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="submit-btn">
            Sign In
        </button>
    </form>
@endsection


