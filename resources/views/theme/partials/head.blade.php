<head>
    <meta charset="UTF-8" />
    <title>
        Gestion de tâches - @yield('title')
    </title>

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

   
    <link rel="icon" type="image/png"   href="{{ asset('assets/images/favicon_io/favicon.png') }}">
   
  
    
     

</head>
