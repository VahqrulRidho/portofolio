@extends('layouts.admin.app')
@section('title', 'Pesan')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="row my-3 mx-3">
                        <div class="col-lg-6">

                            <h4 class="font-weight-bold text-primary">Data Pesan Masuk</h4>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="30px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th width="200px">Isi Pesan</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->subject }}</td>
                                    <td>{{ $data->pesan }}</td>
                                    <td>
                                        <form action="{{ route('admin.pesan.hapus', $data) }}" method="POST"
                                            onclick="return confirm('Yakin Untuk Mengapus Data ?')" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm ">Delete</button>
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
