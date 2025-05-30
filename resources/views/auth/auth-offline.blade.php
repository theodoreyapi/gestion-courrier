<!doctype html>
<html lang="fr" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Page non connecteé | Gestion Courrier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('') }}assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="{{ URL::asset('') }}assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ URL::asset('') }}assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="card overflow-hidden card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <img src="https://img.themesbrand.com/velzon/images/auth-offline.gif" alt=""
                                        height="210">
                                    <h3 class="mt-4 fw-semibold">Vous êtes actuellement hors ligne</h3>
                                    <p class="text-muted mb-4 fs-14">Nous ne pouvons pas afficher ces images car vous
                                        n'êtes pas connecté à Internet. Une fois connecté, actualisez la page ou cliquez
                                        sur le bouton ci-dessous.</p>
                                    <button class="btn btn-success btn-border"
                                        onClick="window.location.href=window.location.href">Rafraîchir</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ URL::asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('') }}assets/js/plugins.js"></script>

</body>

</html>
