<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials._head')
<style>
    .nav-link {
        font-weight: bold;
        padding: 15px;
    }

    .nav-link:hover,
    .dropdown-toggle, .active {
        background-color: #009cff;
        color: white !important;
    }
</style>

<body id="m-0 p-0">
    <div class="container-xxl position-relative bg-white d-flex p-0">
        


        <!-- Content Start -->
        <div class="container-fluid px-0" style="overflow: hidden;">
            <!-- Navbar Start -->
            @include('layouts.partials._dash_nav-hospital')
            <!-- Navbar End -->


            <!-- content Start -->
            @yield('content')
            <!-- content End -->


            <!-- Footer Start -->
            @include('layouts.partials._footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#myDataTable').DataTable();
      });
    </script>
</body>

</html>