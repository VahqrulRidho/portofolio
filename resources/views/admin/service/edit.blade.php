@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Update Data Profile</h4>
                        </div>

                        <form action="{{ route('admin.service.update', $data) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama Service</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Service"
                                            value="{{ $data->nama }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" class="mb-2">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi" required>{{ $data->deskripsi }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                    <a class="btn btn-dark" href="{{ route('admin.service') }}">Back</a>
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
