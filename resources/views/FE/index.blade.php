<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/frontend/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/frontend/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/frontend/css/tiny-slider.css">
    <link rel="stylesheet" href="/frontend/css/aos.css">
    <link rel="stylesheet" href="/frontend/css/glightbox.min.css">
    <link rel="stylesheet" href="/frontend/css/style.css">

    <link rel="stylesheet" href="/frontend/css/flatpickr.min.css">


    <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="index.html" class="logo m-0 float-start">Hotnews<span
                                    class="text-primary">.</span></a>
                        </div>
                        <div class="col-8 text-end">
                        </div>

                        <div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<a href="/login" style="color: white">Login</a>
                            <div style="border-left: 1px solid #B4B4B4"></div>
							<a href="/register"  style="color: white">Register Penulis</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($artikel as $data)
                    <div class="col-md-4">
                        <a href="/detail-artikel/{{$data->id}}" class="h-entry mb-30 v-height gradient">

                            <div class="featured-img" style="background-image: url('/upload/artikel/{{ $data->image }}');"></div>

                            <div class="text">
                                <span class="date">{{ $data->tanggal }}</span>
                                <h2>{!! Str::limit($data->judul_artikel  , 100, $end=" ...")!!}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a href="#">
                            <p style="color:#fff"><img src="/frontend/images/logo/youtube.png" alt="">
                                hotnews </p>
                        </a>
                    </div>
                    <div class="col-4" style="align-content: center">
                        <a href="#">
                            <p style="color:#fff"><img src="/frontend/images/logo/instagram.png" alt="">
                                @hotnews
                            </p>
                        </a>
                    </div>
                    <div class="col-4" style="align-content: center">
                        <a href="#">
                            <p style="color:#fff"><img src="/frontend/images/logo/email.png">
                                hotnews@gmail.com </p>
                        </a>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src="/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/js/tiny-slider.js"></script>

    <script src="/frontend/js/flatpickr.min.js"></script>


    <script src="/frontend/js/aos.js"></script>
    <script src="/frontend/js/glightbox.min.js"></script>
    <script src="/frontend/js/navbar.js"></script>
    <script src="/frontend/js/counter.js"></script>
    <script src="/frontend/js/custom.js"></script>


</body>

</html>
