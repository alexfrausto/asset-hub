<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? config('app.name', 'Laravel') . ' | ' . $title : config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=noto-sans:400,400i,700,700i" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
