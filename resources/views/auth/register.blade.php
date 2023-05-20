<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotnews</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/BE/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/BE/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/BE/assets/css/app.css">
    <link rel="stylesheet" href="/BE/assets/css/pages/auth.css">
</head>

<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('failed'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-8 col-12">
                <div id="auth-left">
                    <div class="auth-logo" width="400px" height="400px">
                        <a href="" class="logo m-0 float-start">
                            <H1>Hotnews.</H1><span class="text-primary"></span>
                        </a>
                    </div>
                    <h3 class="auth-title" style="color:#FF5F00">Sign Up</h3>
                    <p class="auth-subtitle mb-5" style="font-size:20px;">Yuk! Bergabung untuk saling berbagi informasi
                        artikel terbaru.</p>

                    <form method="POST" action="{{ url('register-penulis') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="form-elem-1"> Nama lengkap</label>
                                    <input type="text" id="form-elem-1" class="form-control" name="name"
                                        placeholder="Masukkan nama lengkap" />
                                </div>
                                <div class="form-group">
                                    <label for="form-elem-2"> Username</label>
                                    <input type="text" id="form-elem-2" class="form-control" name="username"
                                        placeholder="Masukkan username" />
                                </div>
                                <div class="form-group">
                                    <label for="form-elem-3"> Email</label>
                                    <input type="email" id="form-elem-3" class="form-control" name="email"
                                        placeholder="Masukkan email" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6" style="border-left: 1px solid #B4B4B4">
                                <div class="form-group">
                                    <label for="form-elem-3"> Password</label>
                                    <input type="password" id="form-elem-3" class="form-control" name="password"
                                        placeholder="Masukkan password" />
                                </div>
                                <div class="form-group">
                                    <label for="form-elem-4"> Konfirmasi Password</label>
                                    <input type="password" id="form-elem-4" class="form-control"
                                        name="confirmed" placeholder="Masukkan konfirmasi password" />
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Kirim">
                    </form>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div id="auth-right">
                    <img src="BE/assets/images/bg/bg_penulis.jpg" height="100%" alt="">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
