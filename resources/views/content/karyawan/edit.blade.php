@extends('layout.main')
@section('judul','Edit Data Karyawan')

@section('content')
    <form method="post" action="{{url('karyawan/update')}}">
        @csrf
        <input type="hidden" name="id" value="{{$karyawan->id}}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{$karyawan->nama}}"
                                   name="nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{$karyawan->email}}"
                                   name="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Posisi</label>
                            <input type="text"
                                   class="form-control @error('posisi') is-invalid @enderror"
                                   value="{{$karyawan->posisi}}"
                                   name="posisi">
                            @error('posisi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date"
                                   class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                   value="{{$karyawan->tanggal_mulai}}"
                                   name="tanggal_mulai">
                            @error('tanggal_mulai')
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
