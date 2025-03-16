<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        @include('partials.navbar')
        <!-- /Top Navbar -->


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer:3000
                });
            </script>
            @endif
            @yield('content')
            <!-- /Container -->
			
            <!-- Footer -->
            <div class="hk-footer-wrap container-fluid">
                @include('partials.footer')
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- Assets JS -->
    @include('partials.js')
	
</body>

</html>