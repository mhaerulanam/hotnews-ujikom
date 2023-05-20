@extends('BE.main')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3> {{ empty($artikel) ? 'Tambah' : 'Edit' }} Data {{ $title }}</h3>
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
                                action="{{ empty($artikel) ? url('artikel') : route('artikel.update', $artikel->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (!empty($artikel))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Judul Artikel</label>
                                                <input type="text" class="form-control" empty($artikel) ? 'readonly' : ''
                                                    placeholder="Masukkan Judul Artikel"
                                                    value="{{ empty($artikel) ? old('judul') : $artikel->judul_artikel }}"
                                                    name="judul">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Image</label>
                                                <input type='file' name="image" id="imgInp" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:24px">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Isi Artikel</label>
                                                <textarea name="isi" id="editor1" class="form-control" cols="20" rows="5">{{ empty($artikel) ? old('isi') : $artikel->isi_artikel }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2" style="margin-top: 16px">
                                        <div class="col mb-0">
                                            <img width="800px" id="blah"
                                                src="{{ !empty($artikel) ? '/upload/artikel/' . $artikel->image : 'http://placehold.it/180' }}"
                                                alt="your image" />
                                        </div>
                                    </div>

                                    {{--  <div class="row">
                                        <div class="col mb-2">
                                            <div class="form-check mt-3">
                                                <input type="hidden" name="status" value="0">
                                                <input type="checkbox" value="1"
                                                    {{ (empty($artikel) ? old('status') : $artikel->status) ? 'checked' : '' }}
                                                    class="form-check-input" id="scales" name="status">
                                                <label class="form-check-label" for="defaultCheck1"> Status </label>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <br>
                                    <div class="col-12 d-flex justify-content-end" style="margin-top:32px">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <a href="/artikel" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                    </div>
                                </div>
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
