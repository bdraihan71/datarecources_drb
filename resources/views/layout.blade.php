<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="DRB">
    <meta name="author" content="Techynaf">

    <title>Data Resource BD</title>

    <!-- Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Data Tables CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <div class="wrapper">
        
        @include('sidenav')

        <!-- Page Content  -->
        <div id="content">

            @include('topnav')

            <div id="content-wrapper">

                <div class="container-fluid">
          
                  @include('breadcrumb')
          
                  @yield('content')
          
                </div>
                <!-- /.container-fluid -->
          
                @include('footer')
          
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>

    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-pill" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- JQuery and Bootstrap -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery Easing -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Plugin JavaScripts -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts -->
    <script src="js/script.js"></script>
    
</body>

</html>