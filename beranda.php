<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back, <?= $_SESSION['nama'] ?></h3>
                                    <p class="mb-0">Please choose this button below to continue.</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if ($_SESSION['level'] == 1) { ?>
                                        <div class="text-center">
                                            <a href="index_admin.php" class="btn bg-gradient-info w-100 mt-4 mb-0">Dashboard</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="text-center">
                                            <a href="index_pemilik.php" class="btn bg-gradient-info w-100 mt-4 mb-0">Dashboard</a>
                                        </div>
                                    <?php }
                                    ?>
                                    <div class="text-center">
                                        <a href="logout.php" class="btn bg-gradient-danger w-100 mt-4 mb-0">Logout</a>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                    <p class="mb-0">Enter your username and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "salah") { ?>
                                            <div class="text-white alert alert-danger alert-dismissible fade show" role="alert">
                                                <span class="alert-icon"></span>
                                                <span class="alert-text text-sm">Username atau Password Salah!</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                    <?php }
                                    } ?>
                                    <form role="form" method="POST" action="proses_login.php">
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="user" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" name="pwd" class="form-control" placeholder="Password" aria-label="Password" id="password" aria-describedby="password-addon">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="showPassword" onclick="showPW()">
                                            <label class="form-check-label" for="showPassword">Show Password</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/curved-images/curved6.jpg')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>