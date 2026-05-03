<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(249, 115, 22, 0.14), transparent 28%),
                linear-gradient(180deg, #fff8f1 0%, #f5ede6 100%);
        }

        .page-shell {
            max-width: 1120px;
        }

        .surface-card,
        .form-card,
        .info-card {
            border: 0;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .hero-pill,
        .tip-pill {
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

        .tip-pill {
            background: rgba(15, 23, 42, 0.06);
            color: #475569;
        }

        .hero-accent {
            background: linear-gradient(135deg, #ea580c 0%, #fb923c 100%);
            color: white;
            border-radius: 28px;
        }

        .hero-stat {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 22px;
            padding: 1rem 1.2rem;
        }

        .form-control,
        .form-control:focus {
            border-radius: 18px;
            padding: 0.9rem 1rem;
            box-shadow: none;
        }

        textarea.form-control {
            min-height: 170px;
            resize: vertical;
        }

        .btn-pill {
            border-radius: 999px;
            padding: 0.8rem 1.4rem;
            font-weight: 600;
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
                            <span class="hero-pill mb-3">Real Contact</span>
                            <h1 class="fw-bold mb-3">Create a real contact message</h1>
                            <p class="text-muted mb-4">
                                Add a message manually for testing, demos, or imported contact requests so your admin inbox reflects real portfolio activity.
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary btn-pill">Back to Messages</a>
                                <a href="{{ route('portfolio') }}#contact" class="btn btn-dark btn-pill">Open Portfolio Contact</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-accent h-100 p-4 p-lg-5 d-flex flex-column justify-content-center">
                        <p class="text-uppercase small mb-2 text-white-50">Tips</p>
                        <h2 class="display-6 fw-bold mb-4">Contact Testing</h2>
                        <div class="hero-stat">
                            <div class="small text-white-50 mb-1">Use this page to</div>
                            <div class="fw-semibold">simulate submissions, verify layout, and test message handling before going live.</div>
                        </div>
                    </div>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="form-card">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-2">Message Details</h3>
                            <p class="text-muted mb-4">Fill in the sender information and message content below.</p>

                            <form action="{{ route('contacts.save') }}" method="POST">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Sender name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="sender@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="subject" class="form-label fw-semibold">Subject</label>
                                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" placeholder="Project inquiry, freelance work, collaboration...">
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="message" class="form-label fw-semibold">Message</label>
                                        <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Write the contact message here">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 d-flex flex-wrap gap-3 pt-2">
                                        <button type="submit" class="btn btn-warning btn-pill">
                                            <i class="bi bi-send-check me-2"></i>
                                            Save Message
                                        </button>
                                        <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary btn-pill">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="info-card h-100">
                        <div class="card-body p-4 p-lg-5">
                            <span class="tip-pill mb-3">What makes it real</span>
                            <h4 class="fw-bold mb-3">This saves to the same inbox</h4>
                            <p class="text-muted mb-4">
                                Messages created here go into the same `contacts` table as the portfolio contact form, so your admin page stays consistent.
                            </p>

                            <div class="d-grid gap-3">
                                <div class="border rounded-4 p-3">
                                    <div class="fw-semibold mb-1">Shared storage</div>
                                    <div class="text-muted small">Manual and portfolio submissions appear together.</div>
                                </div>

                                <div class="border rounded-4 p-3">
                                    <div class="fw-semibold mb-1">Validation included</div>
                                    <div class="text-muted small">Name, email, subject, and message are all checked before save.</div>
                                </div>

                                <div class="border rounded-4 p-3">
                                    <div class="fw-semibold mb-1">Useful for testing</div>
                                    <div class="text-muted small">You can confirm the admin list design even before receiving live messages.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
