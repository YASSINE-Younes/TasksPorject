<!DOCTYPE html>
<html lang="fr">


<!-- Head -->
@include('theme.partials.head')
 



<body>
    <div id="overlay" class="overlay"></div>
    <!-- TOPBAR -->
    @include('theme.partials.topbar')

    <!-- SIDEBAR -->
    @include('theme.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main id="content" class="content py-10">
        <div class="container-fluid">
            
            @yield('content')

        </div>
    </main>




</body>

</html>
