@extends('layout.main')
@section('judul','Tambah Data Product')

@section('content')
    <form method="post" action="{{ route('product.insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   value="{{ old('code') }}"
                                   name="code">
                            @error('code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa">Expiration Date</label>
                            <input type="date"
                                   class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                   value="{{ old('tanggal_kadaluarsa') }}"
                                   name="tanggal_kadaluarsa">
                            @error('tanggal_kadaluarsa')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price') }}"
                                   name="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
