@extends('layout.main')
@section('judul','Data Karyawan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{url('/karyawan/add')}}">Tambah Data Karyawan</a>
                    <a target="_blank" href="{{route('tch.excel')}}" class="btn btn-success">
                        <i class="fas fa-file-excel  "></i> Export XLS
                    </a>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Posisi</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($karyawan->currentPage() -1)* $karyawan->perPage())+1;
                            @endphp
                            @foreach($karyawan as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->posisi}}</td>
                                    <td>{{$data->dob}}</td>
                                    <td>{{$data->age}} Tahun</td>
                                    <td>
{{--                                        @can('superadmin')--}}
                                            <a class="btn btn-warning btn-sm"
                                               href="{{url('karyawan/edit/'.$data->id)}}">
                                                <i class="fas fa-edit  "></i>
                                            </a>
                                            <button type="button"
                                                    data-id-karyawan="{{$data->id}}"
                                                    data-name="{{$data->name}}"
                                                    class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash  "></i>
                                            </button>
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$karyawan->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idkaryawan = $(this).data('id-karyawan');
                let name = $(this).data('name');
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
                            url: '/karyawan/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idkaryawan
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
