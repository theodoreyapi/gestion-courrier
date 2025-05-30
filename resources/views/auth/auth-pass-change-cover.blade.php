<!doctype html>
<html lang="fr" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <meta charset="utf-8" />
    <title>Nouveau mot de passe | Gestion Courrier</title>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4 text-white">
                                                <span style="font-size: 25px">GS</span>
                                                <br>
                                                <strong><em>Gestion Courrier</em></strong>
                                            </div>
                                            <div class="mt-auto">
                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The theme is really great with
                                                                an amazing customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <h5 class="text-primary">Créer un nouveau mot de passe</h5>
                                        <p class="text-muted">Votre nouveau mot de passe doit être différent du mot de
                                            passe utilisé précédemment.</p>

                                        <div class="p-2">
                                            <form action="#" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Mot de passe</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" name="password" class="form-control pe-5 password-input"
                                                            onpaste="return false" placeholder="Entrez le mot de passe"
                                                            id="password-input" aria-describedby="passwordInput"
                                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                    <div id="passwordInput" class="form-text">Doit contenir au moins 8 caractères.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="confirm-password-input">Confirmez le mot de passe</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password_confirmation" class="form-control pe-5 password-input"
                                                            onpaste="return false" placeholder="Confirmez le mot de passe"
                                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                            id="confirm-password-input" required>
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                            type="button" id="confirm-password-input"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Le mot de passe doit contenir:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8
                                                            caractères</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">En <b>miniscule</b>
                                                         (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">Au moins une lettre
                                                        <b>majuscule</b> (A-Z)
                                                    </p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">Un
                                                        <b>nombre</b> minimum (0-9)
                                                    </p>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Réinitialiser le mot de passe</button>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Attendez, je me souviens de mon mot de passe... <a
                                                    href="{{ url('/') }}"
                                                    class="fw-semibold text-primary text-decoration-underline"> Cliquez
                                                    ici </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
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

        <!-- footer -->
        <footer class="footer galaxy-border-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> GS - Gestion Courrier. Créer par <a
                                    href="https://aptiotech.com" target="_blank" style="color: red">AptioTech</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ URL::asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('') }}assets/js/plugins.js"></script>

    <!-- password-addon init -->
    <script src="{{ URL::asset('') }}assets/js/pages/passowrd-create.init.js"></script>
</body>

</html>
