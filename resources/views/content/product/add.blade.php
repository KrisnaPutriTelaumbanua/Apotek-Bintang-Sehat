@extends('layout.main')
@section('judul','Tambah Data Product')

@section('content')
    <form method="post" action="{{url('product/insert')}}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="code"
                                   class="form-control @error('code') is-invalid @enderror"
                                   value="{{old('code')}}"
                                   name="code">
                            @error('rcode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{old('name')}}"
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Kadaluarsa</label>
                            <input type="date"
                                   class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                   value="{{old('tanggal_kadaluarsa')}}"
                                   name="tanggal_kadaluarsa">
                            @error('tanggal_kadaluarsa')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{old('price')}}"
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

