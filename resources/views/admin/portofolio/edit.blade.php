@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Update Judul Resume</h4>
                        </div>

                        <form action="{{ route('admin.portofolio.update', $data) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Judul</label>
                                        <input type="text" name="judul" class="form-control"
                                            placeholder="Judul Portofolio" value="{{ $data->judul }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Kategori</label>
                                        <input type="text" name="kategori" class="form-control" placeholder="Kategori"
                                            value="{{ $data->kategori }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama Klien</label>
                                        <input type="text" name="klien" class="form-control" placeholder="Nama Klien"
                                            value="{{ $data->klien }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Tanggal Project</label>
                                        <input type="date" name="tgl_project" class="form-control"
                                            placeholder="Tanggal Project" value="{{ $data->tgl_project }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <di<label style="font-weight: bold;">Foto</label>
                                            <input type="file" class="form-control" name="foto[]"
                                                placeholder="Masukkan Foto" multiple>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" placeholder="Input Deskripsi" rows="5" required>{{ $data->deskripsi }} </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right mt-2">
                                    <a class="btn btn-dark" href="{{ route('admin.portofolio') }}">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
