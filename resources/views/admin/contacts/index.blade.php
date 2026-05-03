<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(249, 115, 22, 0.14), transparent 28%),
                linear-gradient(180deg, #fff9f3 0%, #f8efe7 100%);
        }

        .page-shell {
            max-width: 1200px;
        }

        .surface-card,
        .message-card {
            border: 0;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .hero-accent {
            background: linear-gradient(135deg, #ea580c 0%, #fb923c 100%);
            color: white;
            border-radius: 28px;
        }

        .hero-pill,
        .tag-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 700;
        }

        .hero-pill {
            background: rgba(234, 88, 12, 0.1);
            color: #c2410c;
        }

        .tag-pill {
            background: rgba(249, 115, 22, 0.12);
            color: #c2410c;
        }

        .hero-stat {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 22px;
            padding: 1rem 1.2rem;
        }

        .btn-pill {
            border-radius: 999px;
            padding: 0.8rem 1.4rem;
            font-weight: 600;
        }

        .message-card {
            height: 100%;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.5rem 0.85rem;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.05);
            color: #475569;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .message-body {
            color: #475569;
            line-height: 1.75;
            white-space: pre-line;
        }

        .empty-state {
            border: 2px dashed rgba(234, 88, 12, 0.2);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.82);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="page-shell mx-auto">
            <div class="row g-4 mb-4">
                <div class="col-lg-7">
                    <div class="surface-card h-100">
                        <div class="card-body p-4 p-lg-5">
                            <span class="hero-pill mb-3">Contact Manager</span>
                            <h1 class="fw-bold mb-3">Review portfolio messages</h1>
                            <p class="text-muted mb-4">
                                Every message submitted from your portfolio contact form will appear here for follow-up.
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-pill">Back to Dashboard</a>
                                <a href="{{ route('contacts.create') }}" class="btn btn-warning btn-pill">Create Message</a>
                                <a href="{{ route('portfolio') }}#contact" class="btn btn-dark btn-pill">Open Contact Section</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-accent h-100 p-4 p-lg-5 d-flex flex-column justify-content-center">
                        <p class="text-uppercase small mb-2 text-white-50">Overview</p>
                        <h2 class="display-5 fw-bold mb-4">{{ $contacts->count() }}</h2>
                        <div class="hero-stat">
                            <div class="small text-white-50 mb-1">Current inbox</div>
                            <div class="fw-semibold">Messages waiting inside your admin panel</div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($contacts->isEmpty())
                <div class="empty-state d-flex flex-column justify-content-center align-items-center text-center p-5">
                    <h3 class="fw-bold mb-2">No messages yet</h3>
                    <p class="text-muted mb-0">Once someone submits the contact form from your portfolio, it will show up here.</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($contacts as $contact)
                        <div class="col-lg-6">
                            <div class="message-card">
                                <div class="card-body p-4 p-lg-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-3">
                                        <div>
                                            <span class="tag-pill mb-3">New Message</span>
                                            <h4 class="fw-bold mb-1">{{ $contact->subject }}</h4>
                                            <p class="text-muted mb-0">From {{ $contact->name }}</p>
                                        </div>

                                        <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                        </form>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="meta-chip">
                                            <i class="bi bi-envelope"></i>
                                            {{ $contact->email }}
                                        </span>
                                        <span class="meta-chip">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $contact->created_at->format('M d, Y h:i A') }}
                                        </span>
                                    </div>

                                    <div class="message-body mb-4">{{ $contact->message }}</div>

                                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject) }}" class="btn btn-warning btn-pill">
                                        Reply by Email
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
