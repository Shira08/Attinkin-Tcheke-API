<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon 
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet 
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet 
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet 
    <link href="css/style.css" rel="stylesheet">
</head-->
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

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        


        <!-- Content Start -->
        <div class="container-fluid px-0">
            <!-- Navbar Start -->
            @include('layouts.partials._dash_nav_pharmacy')
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
           $("#modalEdit").on("show.bs.modal", function (e) {
               var id = $(e.relatedTarget).data('target-id');
               var name = $(e.relatedTarget).data('target-name');
               var type = $(e.relatedTarget).data('target-type');
               var dosage = $(e.relatedTarget).data('target-dosage');
               var people = $(e.relatedTarget).data('target-people');
               $('#id').val(id);
               $('#name').val(name);
               $('#type').val(type);
               $('#dosage').val(dosage);
               $('#people').val(people);
           });
       });
       $("#ok").text("okkkk");
</script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#myDataTable').DataTable();
      });
    </script>
</body>

</html>