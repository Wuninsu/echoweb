<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- Bootstrap 5.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional: Icon Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="min-vh-100 bg-white text-body" data-bs-theme="dark">
    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-body-secondary p-4 p-md-5">
        <div class="w-100" style="max-width: 400px;">
            <a href="{{ route(name: 'home') }}"
                class="d-flex flex-column align-items-center mb-4 text-decoration-none fw-medium">
                <span class="d-flex align-items-center justify-content-center mb-2" style="width: 100px; height: 100px;">
                    
                    @php
                    $setups = App\Models\Setup::setupData();
                    @endphp
                    <img src="{{asset('storage/' . ($setups['favicon'] ?? NO_IMAGE))}}" style="width: 100px; height: 100px;" alt="" srcset="">
                </span>
                <span class="visually-hidden">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <div class="d-flex flex-column gap-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
