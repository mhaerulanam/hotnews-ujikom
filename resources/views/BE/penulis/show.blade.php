@extends('BE.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Data {{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data {{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="row match-height">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="label-text">Judul Artikel</label><br>
                                        <label
                                            class="content-text">{{ $artikel->judul_artikel }}</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:24px">
                                    <div class="col">
                                            <label  class="label-text">Isi Artikel</label><br>
                                            <label class="content-text">{!! empty($artikel) ? old('isi') : $artikel->isi_artikel !!}</label>

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
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
