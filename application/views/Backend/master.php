<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>css/sb-admin.css" rel="stylesheet">
    
<!--                                                   ckeditor-->
    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<!--                                                    end ckeditor-->

</head>

<body id="page-top">


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="<?php echo base_url()?>SuperAdminController">Himel's Admin</a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
</button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
            <span>
                <?php
                $name=$this->session->userdata('name');
                if (isset($name)){
                    echo $name;
                }
                ?>

            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>SuperAdminController/logout" >Logout</a>
        </div>
    </li>
</ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>SuperAdminController">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Category</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Category</h6>
                <a class="dropdown-item" href="<?php echo base_url() ?>SuperAdminController/create_category">Create category</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>SuperAdminController/manage_category">Manage category</a>

            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Blog</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Category</h6>
                <a class="dropdown-item" href="<?php echo base_url() ?>SuperAdminController/create_blog">Create Blog</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>SuperAdminController/manage_blog">Manage Blog</a>

            </div>
        </li>

    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>



                                        <!-- Main Area-->

               <?php  echo $main_content?>

                                        <!--end main area-->





        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © By Himel</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<!--                                                            ckeditor-->
<script>
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserBrowseUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files') ",
        filebrowserImageBrowseUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images",
        filebrowserFlashBrowseUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash",
        filebrowserUploadUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files",
        filebrowserImageUploadUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images",
        filebrowserFlashUploadUrl : "<?php echo base_url(); ?>/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash",
    });
</script>


<!--                                                            end ckeditor-->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url() ?>vendor/chart.<?php echo base_url() ?>js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url() ?>js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url() ?>js/demo/chart-area-demo.js"></script>

</body>

</html>
