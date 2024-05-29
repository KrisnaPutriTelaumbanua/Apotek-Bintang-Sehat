@extends('layout.main')
@section('judul', 'Data Produk')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('product.add') }}">Tambah Data Produk</a>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->tanggal_kadaluarsa }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{ route('product.edit', $product->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                                data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}"
                                                class="btn btn-danger btn-sm btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('.btn-delete').on('click', function () {
                let productId = $(this).data('id');
                let productName = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${productName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("product.delete") }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: productId
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
