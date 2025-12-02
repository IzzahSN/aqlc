<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" href="/images/logo-1.svg">
    <title>Admin Panel</title>
    <script defer src="https://unpkg.com/tailwindcss-intersect@2.x.x/dist/observer.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Sidebar --}}
    @include('components.sidebar-admin')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="sm:ml-64">
        <!-- Navbar -->
        <div class="sticky top-0 z-30 bg-gray-100 py-2 px-2">
            @include('components.navbar-admin')
        </div>
        <!-- Main Content -->
        <main class="p-4 bg-gray-100 min-h-screen">
            {{ $slot }}
        </main>
    </div>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berjaya',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif

    @if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            // title: 'Validation Error',
            title: 'Ralat Pengesahan',
            html: `{!! implode('<br>', $errors->all()) !!}`,
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            // title: 'Error',
            title: 'Ralat',
            text: "{{ session('error') }}",
            showConfirmButton: true,
        });
    </script>
@endif


</body>

</html>