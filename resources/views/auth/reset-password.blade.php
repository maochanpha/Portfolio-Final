@extends('layouts.auth-modern')

@section('title', 'Reset Password')
@section('hero_kicker', 'New Password')
@section('hero_title')
    Choose a fresh password for your <span>workspace</span>.
@endsection
@section('hero_text', 'Set a new password to regain access to the admin area and continue updating your portfolio with confidence.')
@section('hero_note', 'A strong password is one of the quiet details that keeps the rest of your work protected.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Reset password')
@section('form_copy', 'Enter your email and choose a new password below.')

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

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field">
            <label for="email">Email Address</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-grid">
            <div class="field">
                <label for="password">New Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a new password">
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
            Reset Password
        </button>
    </form>
@endsection
