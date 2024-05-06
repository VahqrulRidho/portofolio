@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Tambah Judul Resume</h4>
                        </div>

                        <form action="{{ route('admin.resume.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="font-weight: bold;">Judul Resume</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Judul Resume"
                                            value="{{ old('nama') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right mt-2">
                                    <a class="btn btn-dark" href="{{ route('admin.resume') }}">Back</a>
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
