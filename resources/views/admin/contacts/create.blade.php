@extends('layouts.admin-modern')

@section('title', 'Create Contact Message')

@section('content')
    <section class="page-hero split-hero">
        <div>
            <span class="section-kicker">
                <span class="section-kicker-dot"></span>
                Contact Testing
            </span>
            <h1 class="hero-title">Create a real contact message.</h1>
            <p class="hero-copy">
                Add a message manually for testing, demos, or imported contact requests so your admin inbox reflects real portfolio activity.
            </p>

            <div class="button-row">
                <a href="{{ route('contacts.index') }}" class="btn-light">Back to Messages</a>
                <a href="{{ route('portfolio') }}#contact" class="btn-secondary">Open Portfolio Contact</a>
            </div>
        </div>

        <div class="hero-side">
            <p class="section-label" style="color: rgba(255,255,255,0.7);">Use this page to</p>
            <p class="section-copy">Simulate submissions, verify layout, and test message handling before going live.</p>
        </div>
    </section>

    @if($errors->any())
        <div class="alert-box error">
            Please fix the following:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="grid-2">
        <div class="surface-card">
            <div class="section-label">Message Details</div>
            <h2 class="section-title">Fill in the sender information.</h2>
            <p class="section-copy">Everything saved here goes to the same inbox as portfolio contact submissions.</p>

            <form action="{{ route('contacts.save') }}" method="POST" style="margin-top: 24px;">
                @csrf

                <div class="field-row">
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Sender name">
                        @error('name')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="sender@example.com">
                        @error('email')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Project inquiry, freelance work, collaboration...">
                    @error('subject')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Write the contact message here">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-row">
                    <button type="submit" class="btn-main">Save Message</button>
                    <a href="{{ route('contacts.index') }}" class="btn-ghost">Cancel</a>
                </div>
            </form>
        </div>

        <div class="side-card">
            <div class="section-label">What makes it real</div>
            <h2 class="section-title">This saves to the same inbox.</h2>
            <p class="section-copy">Manual and portfolio submissions appear together so your admin page stays consistent while you test.</p>

            <div class="stack-list" style="margin-top: 22px;">
                <div class="item-card">
                    <div>
                        <div class="tag amber">Shared storage</div>
                        <p class="item-copy" style="margin-top: 12px;">Manual and portfolio submissions appear together.</p>
                    </div>
                </div>
                <div class="item-card">
                    <div>
                        <div class="tag green">Validation included</div>
                        <p class="item-copy" style="margin-top: 12px;">Name, email, subject, and message are checked before save.</p>
                    </div>
                </div>
                <div class="item-card">
                    <div>
                        <div class="tag blue">Useful for testing</div>
                        <p class="item-copy" style="margin-top: 12px;">You can confirm the admin list design even before receiving live messages.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
