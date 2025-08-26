<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" href="/logo-round.svg">
    <title>Guardian Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Sidebar --}}
    @include('components.sidebar-guardian')

    <!-- Content Wrapper -->
    <div class="sm:ml-64">
        <!-- Navbar -->
        <div class="bg-gray-100 py-2 px-2">
            @include('components.navbar-guardian')

        </div>
        <!-- Main Content -->
        <main class="p-4 bg-gray-100 min-h-screen">
            {{ $slot }}
        </main>
    </div>

</body>

</html>