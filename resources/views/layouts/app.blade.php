<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKB4Imkb9Lu5ZbDxFmO5a8h+49P8E1Uzw5jJcMR9EcZCvP1J4kM9WfKkvTO5QrM7RlaV2q+Ug==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Chat App</title>
</head>
<body class="bg-gray-100 w-screen overflow-hidden">
    <x-navbar></x-navbar>

    <div class="flex h-screen  w-[72.5%] float-end overflow-hidden">
        @yield('content')
    </div>
</body>
</html>
