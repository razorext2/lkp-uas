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