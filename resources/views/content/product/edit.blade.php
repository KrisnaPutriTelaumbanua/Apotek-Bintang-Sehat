@extends('layout.main')
@section('judul', 'Edit Product')

@section('content')
    <form method="post" action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   value="{{ $product->code }}"
                                   name="code">
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
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa">Expiration Date</label>
                            <input type="date"
                                   class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                   value="{{ $product->tanggal_kadaluarsa }}"
                                   name="tanggal_kadaluarsa">
                            @error('tanggal_kadaluarsa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ $product->price }}"
                                   name="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
