<!DOCTYPE html>
<html lang="en">
<head>
    <title>Livewire Messenger</title>
    @livewireStyles
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="background-image: url('{{ asset('vonage background.png') }}'); background-size: cover; background-position: center;">
    <div class="flex items-center space-x-3 p-4 bg-black">
        <img src="{{ asset('vonage-logo.png') }}" alt="Vonage Logo" class="h-16 px-4 w-auto">
        <h2 class="text-xl font-bold text-white drop-shadow">Laravel Livewire x Reverb x Echo Messenger</h2>
    </div>
    <livewire:rcs />
    @livewireScripts
</body>
</html>
