<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user-id" content="{{ auth()->id() }}">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite('resources/js/app.js')

    <title>Chat App</title>
</head>
<script>
    const chatId = "{{ auth()->id() }}";
</script>
<body class="bg-gray-100 w-screen overflow-hidden">
    
    @if (!request()->routeIs(['contact.create', 'contact.*']))
        <x-navbar></x-navbar>
    @endif


    <div class="flex h-screen  w-[72.5%] float-end overflow-hidden">
        @yield('content')
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>

</body>
</html>
