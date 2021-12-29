<!-- 
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>SRH Training Center</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">

    <script src="Assets/js/jquery.js" type="text/javascript"></script>
    <script src="Assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="Assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="Assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


    <style type="text/css">
        body {
            margin-top: 70px;
        }

        .modalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 99999;
            opacity: 0;
            transition: opacity 200ms ease-in;
            pointer-events: none;
        }

        .modalDialog:target {
            opacity: 1;
            pointer-events: auto;
        }

        .modalDialog>div {
            width: 400px;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            background: #fff;
            background: linear-gradient(#fff, #aaa);
        }

        .close:hover {
            background: #00d9ff;
        }

        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            text-align: center;
            top: -10px;
            right: -12px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            box-shadow: 1px 1px 3px #000;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>

<body>

    <?php //mengambil file menu.php
    // require 'akun.php';
    ?>

    <?php //mengambil file menu.php
    // require 'menu.php';
    ?>

    <?php //mengambil file menu.php
    // require 'content_admin.php';
    ?>


    <?php //mengambil file menu.php
    // require 'footer.php';
    ?>


    <script type="text/javascript">
        $(function() {
            $('#dtskripsi').dataTable();
        });
    </script>


</body>

</html> -->

<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php
session_start();
//Aktifkan session
require 'config/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'split/head.php'; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include 'split/aside.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include 'split/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-4">

                <div class="col-xl-3 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Peserta</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php

                                            $n = mysqli_query($koneksi, "select * from peserta");
                                            $d = mysqli_num_rows($n);

                                            echo $d;
                                            ?>
                                            <span class="text-primary text-sm font-weight-bolder"> Orang</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Instruktur</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php

                                            $n = mysqli_query($koneksi, "select * from instruktur");
                                            $d = mysqli_num_rows($n);

                                            echo $d;
                                            ?>
                                            <span class="text-warning text-sm font-weight-bolder"> Orang</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pembayaran</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php

                                            $n = mysqli_query($koneksi, "select * from bayar");
                                            $d = mysqli_num_rows($n);

                                            echo $d;
                                            ?>
                                            <span class="text-success text-sm font-weight-bolder"> Kali</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kursus</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php

                                            $n = mysqli_query($koneksi, "select * from kursus");
                                            $d = mysqli_num_rows($n);

                                            echo $d;
                                            ?>
                                            <span class="text-danger text-sm font-weight-bolder"> Terdaftar</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 mb-lg-0">
                    <div class="card py-3">
                        <div class="card-body px-3 py-1">
                            <?php include 'content_admin.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'split/footer.php'; ?>
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include 'split/js.php'; ?>
</body>

</html>