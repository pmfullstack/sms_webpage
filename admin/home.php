<?php include('../includes/config.php');

if (!isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == "") {
    header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="icon" href="../icon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN DASHBOARD</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- toastr -->
    <link href="../css/toastr/toastr.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--Nav Start  -->
        <?php include('template/nav.php') ?>
        <!-- /#nav -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Header Start -->
                <?php include('template/header.php'); ?>
                <!-- /#header -->

                <!-- Begin Page Content -->
                <?php

                @$page = $_REQUEST['page'];
                //  echo "<pre>";
                //print_r($_SERVER);
                if ($page == '' && basename($_SERVER['PHP_SELF']) == 'home.php') {
                    $page = 'dashboard';
                }
                if ($page != '' && file_exists('middlepage/' . $page . '.php')) {
                    include('middlepage/' . $page . '.php');
                } else {
                    include('middlepage/404.php');
                }

                ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('template/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button and Logout Modal-->
    <?php include('template/modal.php') ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- toastr -->
    <script src="../vendor/toastr/toastr.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#sidebarToggle').on('click', function() {
                if ($('#test').hasClass('fb')) {
                    $('#test').removeClass('fb');
                    $('#test').attr('src', '../img/logo.jpg');
                } else {
                    $('#test').addClass('fb');
                    $('#test').attr('src', '../img/logoi2.jpg');
                }
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.clear();
        });
    </script>
</body>

</html>