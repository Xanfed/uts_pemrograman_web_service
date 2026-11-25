<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS Pem Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Helvetica, Arial, sans-serif;
            background-color: #fbfbfd;
            color: #212529;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .custom-navbar {
            padding-top: 1.25rem;
            padding-bottom: 1rem;
            background-color: transparent;
        }
        .navbar-brand {
            font-size: 1.15rem;
            font-weight: 600;
            color: #1f2937 !important;
            margin-right: 2rem;
        }
        .custom-nav-link {
            font-size: 0.95rem;
            text-decoration: none;
            padding: 0 0.75rem;
            color: #6c757d;
            transition: color 0.15s ease-in-out;
        }
        .custom-nav-link.active, .custom-nav-link:hover {
            color: #111827;
        }
        footer {
            margin-top: auto;
            padding-top: 3.5rem;
            padding-bottom: 2.5rem;
        }
        .footer-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.75rem;
            margin-bottom: 1.75rem;
        }
        .footer-nav a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.15s ease;
        }
        .footer-nav a:hover { color: #212529; }
        .footer-divider {
            border-top: 1px solid #e5e7eb;
            max-width: 960px;
            margin: 0 auto 1.5rem auto;
        }
        .footer-copyright {
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="custom-navbar">
        <div class="container" style="max-width: 980px;">
            <div class="d-flex align-items-center flex-wrap">
                <a class="navbar-brand mb-0" href="{{ route('biodata.index') }}">UTS Pem Web</a>
                <nav class="d-flex align-items-center flex-wrap gap-2">
                    <a class="custom-nav-link {{ request()->routeIs('biodata.index') ? 'active' : '' }}" href="{{ route('biodata.index') }}">Home</a>
                    <a class="custom-nav-link" href="#">Features</a>
                    <a class="custom-nav-link" href="#">Anak Agung Ngurah Sugiri Astha Putra Panji</a>
                    <a class="custom-nav-link" href="#">24010110179</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow-1">
        <div class="container" style="max-width: 980px;">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container" style="max-width: 980px;">
            <div class="footer-nav">
                <a href="{{ route('biodata.index') }}">Home</a>
                <a href="#">Features</a>
                <a href="#">Pricing</a>
                <a href="#">FAQs</a>
                <a href="#">About</a>
            </div>
            <div class="footer-divider"></div>
            <p class="footer-copyright mb-0">
                &copy; 2025 Dibuat Sejujurnya Oleh Team Anak Agung Ngurah Sugiri Astha Putra Panji dan Bagus Dwi Syahputra Tanpa Mencotek dari Tim Lain
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
