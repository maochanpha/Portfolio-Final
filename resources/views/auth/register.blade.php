@extends('layouts.auth-modern')

@section('title', 'Register')
@section('hero_kicker', 'New Account')
@section('hero_title')
    Create an account for your <span>admin workspace</span>.
@endsection
@section('hero_text', 'Set up your account so you can manage portfolio content, maintain a clean showcase, and keep your updates organized from one place.')
@section('hero_note', 'A thoughtful portfolio feels better when the editing experience is just as clean as the public-facing pages.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Create account')
@section('form_copy', 'Fill in your details below to register a new admin account.')

@section('hero_metrics')
    <div class="metric-card">
        <span class="metric-value">Name</span>
        <span class="metric-label">Create a clear identity for the admin account.</span>
    </div>
    <div class="metric-card">
        <span class="metric-value">Email</span>
        <span class="metric-label">Use an address you can access for verification and reset links.</span>
    </div>
    <div class="metric-card">
        <span class="metric-value">Secure</span>
        <span class="metric-label">Start with a strong password and keep access controlled.</span>
    </div>
@endsection

@section('content')
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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field">
            <label for="name">Name</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your full name">
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="email">Email Address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-grid">
            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a password">
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm your password">
                @error('password_confirmation')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="submit-btn">
            Create Account
        </button>
    </form>
@endsection

@section('form_footer')
    Already registered?
    <a href="{{ route('login') }}">Log in here</a>
@endsection
