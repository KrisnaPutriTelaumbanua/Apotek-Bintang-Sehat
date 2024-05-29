@extends('layout/main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Shift</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('shift.add') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{session()->get('pesan')[0]}}">
                {{session()->get('pesan')[1]}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Karyawan</th>
                            <th>Tanggal Shift</th>
                            <th>Jenis Shift</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($shifts as $shift)
                            <tr>
                                <td>{{ $shift->id }}</td>
                                <td>{{ $shift->karyawan_id }}</td>
                                <td>{{ $shift->tanggal_shift }}</td>
                                <td>{{ $shift->jenis_shift }}</td>
                                <td>{{ $shift->waktu_mulai }}</td>
                                <td>{{ $shift->waktu_selesai }}</td>
                                <td>
                                    <a href="{{ url('shift/edit/' . $shift->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"> Edit </i></a>
                                    <a href="{{ route('shift.delete', $shift->id) }}" onclick="return confirm('Anda Yakin ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endsection
