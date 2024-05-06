@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="row my-3 mx-3">
                        <div class="col-lg-6">

                            <h4 class="font-weight-bold text-primary">Data Detail Resume</h4>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a class="btn btn-primary" href="{{ route('admin.detail-resume.create') }}">
                                <i class="fas fa-plus"></i> Add Detail Resume
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="30px">No</th>
                                <th>Judul Resume</th>
                                <th>Nama Resume</th>
                                <th width="180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailResume as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->resumes->nama }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.detail-resume.edit', $data) }}">Edit</a>
                                        <a class="btn btn-success mx-1 btn-sm"
                                            href="{{ route('admin.detail-resume.show', $data->id) }}">Show</a>
                                        <form action="{{ route('admin.detail-resume.destroy', $data) }}" method="POST"
                                            onclick="return confirm('Yakin Untuk Mengapus Data ?')" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
