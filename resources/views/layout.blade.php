<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="DRB">
    <meta name="author" content="Techynaf">

    <title>Data Resources BD</title>

    <!-- Font Awesome -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Data Tables CSS -->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="/img/favicon.png">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145375324-8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145375324-8');
    </script>


</head>

<body id="page-top">


    @yield('main-content')
    @yield('sub-content')
    @yield('admin-content')


    <!-- Scroll to Top Button-->
    <button class="rounded-pill" onclick="topFunction()" id="scroll-to-top" title="Go to top">
        <i class="fas fa-angle-up"></i>
    </button>

    <!-- JQuery and Bootstrap -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery Easing -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Plugin JavaScripts -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts -->
    <script src="/js/script.js"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dce8059e10469a8"></script>

    <script>
    $(window).scroll(function() {
        sessionStorage.scrollTop = $(this).scrollTop();
    });

    $(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
        $(window).scrollTop(sessionStorage.scrollTop);
    }
    });
    </script>
</body>

</html>
