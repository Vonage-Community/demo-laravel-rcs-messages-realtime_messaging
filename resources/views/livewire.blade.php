<head>
    <title>Livewire Basic Example</title>
    @livewireStyles
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body>
    <livewire:chat />
    @livewireScripts
</body>
