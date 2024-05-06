@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Tambah Data Contact</h4>
                        </div>

                        <form action="{{ route('admin.contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Alamat Lengkap</label>
                                        <input type="text" name="alamat" class="form-control"
                                            placeholder="Alamat Lengkap" value="{{ old('alamat') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nomor Handphone</label>
                                        <input type="number" class="form-control" name="no_hp"
                                            placeholder="Nomor Handphone" value="{{ old('no_hp') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Link Facebook</label>
                                        <input type="url" name="facebook" class="form-control"
                                            placeholder="Link Facebook" value="{{ old('facebook') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Link Instagram</label>
                                        <input type="url" name="instagram" class="form-control"
                                            placeholder="Link Instagram" value="{{ old('instagram') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Link Linkedin</label>
                                        <input type="url" name="linkedin" class="form-control"
                                            placeholder="Link Linkedin" value="{{ old('linkedin') }}">
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-dark" href="{{ route('admin.contact') }}">Back</a>
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
