@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Tambah Data Profile</h4>
                        </div>

                        <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                            value="{{ old('nama') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                            value="{{ old('pekerjaan') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                            placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Usia</label>
                                        <input type="number" class="form-control" name="usia" placeholder="Usia"
                                            value="{{ old('usia') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <di<label style="font-weight: bold;">Foto</label>
                                            <input type="file" class="form-control mt-2" name="foto"
                                                placeholder="Masukkan Foto" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Deskripsi</strong>
                                        <textarea id="editor" name="deskripsi" class="form-control" placeholder="Input Deskripsi" rows="5"
                                            value="{{ old('deskripsi') }}" required> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-dark" href="{{ route('admin.profile') }}">Back</a>
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
