<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SISTA</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<!-- body -->

<body>
    <div class="header">
        <div class="container">
            <!--  header inner -->
            <div class="col-sm-12">
                <div class="menu-area">
                    <nav class="navbar navbar-expand-lg ">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="last"><a href="#" data-toggle="modal" data-target="#exampleModal2">DAFTAR</a></li>
                                <li class="last"><a href="#" data-toggle="modal" data-target="#exampleModal">LOGIN</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end header end -->

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="login-form" action="<?= base_url('Auth/aksi_login') ?>" method="POST">
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input id="emaillogin" type="email" class="form-control" placeholder=" " name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input id="pwlogin" type="password" class="form-control" placeholder=" " name="password" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                            </div>
                        </div>
                        <p class="text-center dont-do mt-3">Don't have an account?
                            <a href="#" class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#exampleModal2">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!-- modal register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">DAFTAR PESERTA SEMINAR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Auth/proses_register') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-form-label">NIM</label>
                            <input type="text" class="form-control" placeholder=" " name="nim" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama</label>
                            <input type="text" class="form-control" placeholder=" " name="nama" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Seminar</label>
                            <select name="seminar_id" class="form-control">
                                <?php foreach ($seminars as $seminar) { ?>
                                    <option value="<?= $seminar->id ?>"><?= $seminar->judul ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="password" id="password1" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="btn btn-primary" value="Daftar">
                        </div>
                        <div class="sub-w3l">
                            <p class="text-center dont-do mt-3">I Have Account?
                                <a href="#" class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#exampleModal">
                                    Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>