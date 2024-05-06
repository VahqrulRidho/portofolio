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

                        <form action="{{ route('admin.detail-resume.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Judul Resume</label>
                                        <select class="js-example-basic-single form-control" name="id_resume" required>
                                            <option selected>Pilih Judul Resume</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Nama Resume</label>
                                        <input type="text" name="judul" class="form-control" placeholder="Nama Resume"
                                            value="{{ old('judul') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Deskripsi</strong>
                                        <textarea id="editor" name="deskripsi" class="form-control" placeholder="Input Deskripsi" rows="5"
                                            value="{{ old('deskripsi') }}" required> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right mt-2">
                                    <a class="btn btn-dark" href="{{ route('admin.detail-resume') }}">Back</a>
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
