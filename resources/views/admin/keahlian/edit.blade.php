@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card my-5">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="pull-left mb-3">
                            <h4 class="font-weight-bold text-primary">Update Data Keahlian</h4>
                        </div>

                        <form action="{{ route('admin.keahlian.update', $data) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-4">
                                    <label style="font-weight: bold;">Nama Keahlian</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Nama Keahlian" value="{{ $data->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label style="font-weight: bold;" class="mb-2">Persentase Keahlian</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="number" name="keahlian" value="{{ $data->keahlian }}"
                                            class="form-control" rows="5" placeholder="Persentase Keahlian"
                                            max="100" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <h5>%</h5>
                                </div>
                                <div class="col-md-12 text-right mt-2">
                                    <a class="btn btn-dark" href="{{ route('admin.keahlian') }}">Back</a>
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
