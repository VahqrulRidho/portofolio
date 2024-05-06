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
                                <h4 class="font-weight-bold text-primary">View Data Resume Detail</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-dark" href="{{ route('admin.detail-resume') }}"> <i
                                        class="fas fa-angle-double-left"> </i> Back</a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('admin.profile.update', $data) }}" method="POST">
                            @csrf
                            @method('PATCH') --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Judul Resume</label>
                                    <input type="text" name="id_resume" class="form-control"
                                        value="{{ $data->resumes->nama }}" disabled required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Nama Resume</label>
                                    <input type="text" name="judul" class="form-control" value="{{ $data->judul }}"
                                        disabled required>
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
