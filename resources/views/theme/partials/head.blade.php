<head>
    <meta charset="UTF-8" />
    <title>InApp Inventory Dashboard</title>

    {{-- Start Code Dark light mode --}}
    <script>
        (function() {

            const savedTheme =
                localStorage.getItem('theme') || 'system';

            const systemTheme =
                window.matchMedia('(prefers-color-scheme: dark)').matches ?
                'dark' :
                'light';

            const activeTheme =
                savedTheme === 'system' ?
                systemTheme :
                savedTheme;

            document.documentElement.setAttribute(
                'data-bs-theme',
                activeTheme
            );

        })();
    </script>
    {{-- End Code Dark light mode --}}


    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets') }}/images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('assets') }}/images/favicon_io/site.webmanifest">

</head>
