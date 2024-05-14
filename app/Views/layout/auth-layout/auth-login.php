<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $auth_title; ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="/assets/fontawesome/fontawesome-1/css/all.min.css" rel="stylesheet" />
    <link href="/assets/fontawesome/fontawesome-2/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
</head>

<body>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                            <i class="fa-solid fa-store"></i>
                            Point Of Sale
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item <?= ($auth_title == 'myPos - Beranda') ? 'fw-bold' : '' ?> ">
                                    <a class="nav-link me-3" href="/">
                                        <i class="fa-solid fa-gauge  <?= ($auth_title == 'myPos - Beranda') ? '' : 'opacity-6' ?> text-dark me-1"></i>
                                        Beranda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-4" href="/tentang">
                                        <i class="fa-solid fa-circle-info opacity-6 text-dark me-1 "></i>
                                        Tentang
                                    </a>
                                </li>
                                <li class="nav-item <?= ($auth_title == 'myPos - Login') ? 'fw-bold' : '' ?> ">
                                    <a class="nav-link me-3" href="/auth">
                                        <i class="fas fa-key <?= ($auth_title == 'myPos - Login') ? '' : 'opacity-6' ?> text-dark me-1"></i>
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item <?= ($auth_title == 'myPos - Register') ? 'fw-bold' : '' ?> ">
                                    <a class="nav-link me-3 " href="/auth/register">
                                        <i class="fas fa-user-circle <?= ($auth_title == 'myPos - Register') ? '' : 'opacity-6' ?> text-dark me-1"></i>
                                        Register
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <?= $this->renderSection('auth-main'); ?>
    </main>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>