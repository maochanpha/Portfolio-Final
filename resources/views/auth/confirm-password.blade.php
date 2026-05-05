@extends('layouts.auth-modern')

@section('title', 'Confirm Password')
@section('hero_kicker', 'Security Check')
@section('hero_title')
    Confirm your password before entering a <span>secure area</span>.
@endsection
@section('hero_text', 'This extra step protects sensitive account actions and keeps the admin workspace safely behind your credentials.')
@section('hero_note', 'High-trust actions deserve one more checkpoint, especially when account settings are involved.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Confirm password')
@section('form_copy', 'Please re-enter your current password to continue.')

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

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="field">
            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your current password">
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="submit-btn">
            Confirm
        </button>
    </form>
@endsection
