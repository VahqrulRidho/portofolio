@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 pull-left mb-3">
                                <h4 class="font-weight-bold text-primary">View Data Profile</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-dark" href="{{ route('admin.profile') }}"> <i
                                        class="fas fa-angle-double-left"> </i> Back</a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('admin.profile.update', $data) }}" method="POST">
                            @csrf
                            @method('PATCH') --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}"
                                        placeholder="Nama Lengkap" disabled required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                        value="{{ $data->pekerjaan }}" disabled required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Foto</label><br>
                                    <img src="{{ url('gambar/profile/' . $data->foto) }}" alt="Product Thumb" width="100"
                                        height="100" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"
                                        value="{{ $data->tgl_lahir }}" disabled required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Usia</label>
                                    <input type="number" class="form-control" name="usia" placeholder="Usia"
                                        value="{{ $data->usia }}" disabled required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;" class="mb-2">Deskripsi</label>
                                    <div class="card" style="background-color: #e9e9e9;">
                                        <div class="card-body">
                                            {!! $data->deskripsi !!}
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
