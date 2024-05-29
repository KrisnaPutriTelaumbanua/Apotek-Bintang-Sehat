@extends('layout.main')

@section('judul', 'Tambah Data Product')

@section('content')
    <form method="post" action="{{ url('product/update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   value="{{ $product->code }}"
                                   name="code" id="code">
                            @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ $product->name }}"
                                   name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                            <input type="text"
                                   class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                   value="{{ $product->tanggal_kadaluarsa }}"
                                   name="tanggal_kadaluarsa" id="tanggal_kadaluarsa">
                            @error('tanggal_kadaluarsa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ $product->price }}"
                                   name="price" id="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
