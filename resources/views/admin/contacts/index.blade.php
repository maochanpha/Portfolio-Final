@extends('layouts.admin-modern')

@section('title', 'Messages')

@push('styles')
    <style>
        .messages-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .message-body {
            color: #475569;
            line-height: 1.75;
            white-space: pre-line;
            margin-top: 16px;
        }

        @media (max-width: 860px) {
            .messages-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Contact Manager
            </span>
            <h1 class="hero-title">Review portfolio messages.</h1>
            <p class="hero-copy">
                Every message submitted from your portfolio contact form will appear here for follow-up.
            </p>

            <div class="button-row">
                <a href="{{ route('admin.dashboard') }}" class="btn-light">Back to Dashboard</a>
                <a href="{{ route('contacts.create') }}" class="btn-main">Create Message</a>
                <a href="{{ route('portfolio') }}#contact" class="btn-secondary">Open Contact Section</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Current inbox</p>
            <h3 style="margin: 0 0 10px; font-size: 3rem;">{{ $contacts->count() }}</h3>
            <p class="section-copy">Messages waiting inside your admin panel.</p>
        </div>
    </section>

    @if(session('success'))
        <div class="alert-box success">{{ session('success') }}</div>
    @endif

    @if($contacts->isEmpty())
        <section class="empty-state">
            <h3>No messages yet</h3>
            <p>Once someone submits the contact form from your portfolio, it will show up here.</p>
        </section>
    @else
        <section class="messages-grid">
            @foreach($contacts as $contact)
                <article class="item-card" style="height: 100%;">
                    <div style="width: 100%;">
                        <div class="tag amber">New Message</div>
                        <h3 class="item-title" style="margin-top: 14px;">{{ $contact->subject }}</h3>
                        <p class="item-copy">From {{ $contact->name }}</p>

                        <div class="meta-row">
                            <span class="meta-chip">
                                <i class="bi bi-envelope"></i>
                                {{ $contact->email }}
                            </span>
                            <span class="meta-chip">
                                <i class="bi bi-calendar3"></i>
                                {{ $contact->created_at->format('M d, Y h:i A') }}
                            </span>
                        </div>

                        <div class="message-body">{{ $contact->message }}</div>

                        <div class="button-row">
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject) }}" class="btn-main">Reply by Email</a>
                        </div>
                    </div>

                    <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Delete</button>
                    </form>
                </article>
            @endforeach
        </section>
    @endif
@endsection
