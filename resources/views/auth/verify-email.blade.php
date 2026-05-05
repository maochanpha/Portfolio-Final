@extends('layouts.auth-modern')

@section('title', 'Verify Email')
@section('hero_kicker', 'Email Verification')
@section('hero_title')
    One quick step to verify your <span>email address</span>.
@endsection
@section('hero_text', 'Check your inbox and click the verification link we sent so your account can be fully activated for admin access.')
@section('hero_note', 'Verification keeps account ownership clear and makes recovery flows more dependable later on.')
@section('form_kicker', 'Portfolio Admin')
@section('form_title', 'Verify email')
@section('form_copy', 'Before getting started, please confirm your email address using the link we emailed you.')

@section('content')
    @if (session('status') == 'verification-link-sent')
        <div class="status-box">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <div class="status-box">
        If you did not receive the email, you can request another verification link below.
    </div>

    <div class="inline-actions">
        <form method="POST" action="{{ route('verification.send') }}" style="width: 100%;">
            @csrf
            <button class="submit-btn" type="submit">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
            @csrf
            <button type="submit" class="secondary-btn" style="width: 100%;">Log Out</button>
        </form>
    </div>
@endsection
