@extends('layouts.auth-modern')

@section('title', 'Forgot Password')
@section('hero_kicker', 'Password Recovery')
@section('hero_title')
    Reset access without losing your <span>momentum</span>.
@endsection
@section('hero_text', 'Enter the email address tied to your account and Laravel will send you a secure link so you can choose a new password.')
@section('hero_note', 'Recovery should feel calm and clear. This step keeps the workflow simple while preserving account security.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Forgot password')
@section('form_copy', 'Tell us which email belongs to your account and we will send a password reset link.')

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

    <form method="POST" action="{{ route('password.email') }}">
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

        <button type="submit" class="submit-btn">
            Email Reset Link
        </button>
    </form>
@endsection

@section('form_footer')
    Remembered your password?
    <a href="{{ route('login') }}">Return to login</a>
@endsection
