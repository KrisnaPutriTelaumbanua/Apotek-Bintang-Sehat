@extends('layout/main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Karyawan</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('karyawan.add') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Posisi</th>
                            <th>Tanggal Mulai</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($karyawan as $row)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->posisi}}</td>
                                <td>{{$row->tanggal_mulai}}</td>
                                <td>
                                    <a href="{{route('karyawan.edit',$row->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i> Ubah</a>
                                    <a href="#" data-id-karyawan="{{$row->id}}" data-nama="{{$row->nama}}" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection

        @push('js')
            <script>
                $(function () {
                    $('.btn-hapus').on('click', function () {
                        let idKaryawan = $(this).data('id-karyawan');
                        let name = $(this).data('nama');
                        Swal.fire({
                            title: "Konfirmasi",
                            text: `Anda yakin hapus data ${name}?`,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Hapus!",
                            cancelButtonText: "Batal",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '{{ route('karyawan.hapus') }}',
                                    type: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        id: idKaryawan
                                    },
                                    success: function () {
                                        Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                            .then(function () {
                                                window.location.reload();
                                            })
                                    },
                                    error: function () {
                                        Swal.fire('Gagal', 'Terjadi kesalahan ketika hapus data', 'error');
                                    }
                                });
                            }
                        });
                    });
                });
            </script>
    @endpush
