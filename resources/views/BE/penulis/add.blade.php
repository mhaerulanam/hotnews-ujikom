@extends('BE.main')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3> {{ empty($penulis) ? 'Tambah' : 'Edit' }} Data {{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data {{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                action="{{ empty($penulis) ? url('penulis') : route('penulis.update', $penulis->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (!empty($penulis))
                                    @method('PUT')
                                @endif
                                @if (empty($penulis))
                                    <div class="row">
                                        <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="form-elem-1"> Nama lengkap</label>
                                                        <input type="text" id="form-elem-1" class="form-control" name="name"
                                                            placeholder="Masukkan nama lengkap" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-elem-3"> Email</label>
                                                        <input type="email" id="form-elem-3" class="form-control" name="email"
                                                            placeholder="Masukkan email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="form-elem-2"> Username</label>
                                                        <input type="text" id="form-elem-2" class="form-control" name="username"
                                                            placeholder="Masukkan username" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="form-elem-3"> Password</label>
                                                        <input type="password" id="form-elem-3" class="form-control" name="password"
                                                            placeholder="Masukkan password" />
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-2">
                                                <div class="form-check mt-3">
                                                    <input type="hidden" name="status" value="0">
                                                    <input type="checkbox" value="1"
                                                        {{ (empty($penulis) ? old('status') : $penulis->status) ? 'checked' : '' }}
                                                        class="form-check-input" id="scales" name="status">
                                                    <label class="form-check-label" for="defaultCheck1"> Status </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-12 d-flex justify-content-end" style="margin-top:32px">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="/penulis" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                        </div>
                                    </div>
                                @else
                                <div class="row">
                                    <div class="row">
                                        <div class="col mb-2">
                                            <div class="form-check mt-3">
                                                <input type="hidden" name="status" value="0">
                                                <input type="checkbox" value="1"
                                                    {{ (empty($penulis) ? old('status') : $penulis->status) ? 'checked' : '' }}
                                                    class="form-check-input" id="scales" name="status">
                                                <label class="form-check-label" for="defaultCheck1"> Status </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 d-flex justify-content-end" style="margin-top:32px">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <a href="/penulis" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@stop
