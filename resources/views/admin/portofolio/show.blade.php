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
                                <h4 class="font-weight-bold text-primary">View Data Portofolio</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-dark" href="{{ route('admin.portofolio') }}"> <i
                                        class="fas fa-angle-double-left"> </i> Back</a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('admin.profile.update', $data) }}" method="POST">
                            @csrf
                            @method('PATCH') --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Judul</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul Portofolio"
                                        value="{{ $data->judul }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" placeholder="Kategori"
                                        value="{{ $data->kategori }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Nama Klien</label>
                                    <input type="text" name="klien" class="form-control" placeholder="Nama Klien"
                                        value="{{ $data->klien }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Tanggal Project</label>
                                    <input type="date" name="tgl_project" class="form-control"
                                        placeholder="Tanggal Project" value="{{ $data->tgl_project }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Input Deskripsi" rows="5" required disabled>{{ $data->deskripsi }} </textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;" class="mb-2">Foto</label>
                                    <div class="card">
                                        <div class="card-body">
                                            @foreach ($foto as $item)
                                                <img src="{{ url('gambar/portofolio/' . $item->foto) }}" alt="Product Thumb"
                                                    width="100" height="100" />
                                            @endforeach
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
