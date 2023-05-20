<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                            <a href="" class="logo m-0 float-start"><H1  style="color:white">Hotnews.</H1><span
                                class="text-primary"></span></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
{{--
                <li class="sidebar-item {{ Request::segment(1) == 'artikel' ? 'active' : ''}} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu " style="display:{{ Request::segment(1) == 'artikel'? 'block' : 'none'}}">
                        <li class="submenu-item " style="font-weight:{{ Request::segment(1) == 'artikel' ? 'bold' : 'normal'}}">
                            <a href="/artikel">Data Artikel</a>
                        </li>
                    </ul>
                </li>  --}}

                <li class="sidebar-item  {{ Request::segment(1) == 'artikel' ? 'active' : ''}}">
                    <a href="/artikel" class='sidebar-link'>
                        <i class="bi bi-file-earmark-x-fill"></i>
                        <span>Data Artikel</span>
                    </a>
                </li>
                @if(Auth::user()->role == 1)
                    <li class="sidebar-item  {{ Request::segment(1) == 'penulis' ? 'active' : ''}}">
                        <a href="/penulis" class='sidebar-link'>
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            <span>Data Penulis</span>
                        </a>
                    </li>
                @endif

                {{--  <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Laporan Berkas</span>
                    </a>
                </li>  --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<div id="main" class='layout-navbar'>
    <header class='mb-3'>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                @if (Request::segment(1) == 'dashboard')
                    <div class="page-heading" style="margin-left: 16px; margin-top:20px;">
                        <h3>{{ $title }}</h3>
                    </div>
                @endif

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    </ul>
                    <div class="dropdownsa">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                    <p class="mb-0 text-sm text-gray-600">
                                        {{ Auth::user()->role == 1
                                            ? "Administrator"
                                            :  (Auth::user()->role == 2
                                            ? "Penulis"
                                            : "User")}}
                                    </p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="/upload/users/{{ Auth::user()->image == null ?'person-empty.png' : Auth::user()->image }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Hello, {{ Auth::user()->name }} !</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }} "  id="logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Yakin Keluar Akun?')">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

<script>
    $(docoment).on("click", "#logout", function(event) {
        console.log("hakkk======");
        event.preventDefault();
        let form = $(this);
        swal({
                title: "Are you Want to logout?",
                text: "",
                icon: "warning",
                buttons: true,
                dragerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Logout Canceled");
                }
            });
    });
</script>
