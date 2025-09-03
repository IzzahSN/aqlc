<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            text: 'Welcome back, {{ $name }}!',
            timer: 2000, // 2 saat
            timerProgressBar: true,
            showConfirmButton: false
        }).then(() => {
            window.location.href = "{{ $redirect }}";
        });
    </script>
</body>
</html>
