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

    {{--  @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  --}}
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo" width="400px" height="400px">
                        <a href="" class="logo m-0 float-start"><H1>Hotnews.</H1><span
                            class="text-primary"></span></a>
                    </div>
                    <h3 class="auth-title" style="color:#FF5F00">Log in</h3>
                    <p class="auth-subtitle mb-5" style="font-size:20px;">Selamat Datang.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl"
                                name="username" placeholder="Masukkan Username" >
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" value="{{ old('password') }}"
                                name="password" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">LOGIN</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"
                    style="display:contents;
                align-items: center;
                justify-content: center;">
                    <img src="BE/assets/images/bg/Gedung-Jurusan-TI.jpg" height="100%"
                        alt="">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
