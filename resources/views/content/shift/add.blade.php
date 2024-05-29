@extends('layout.main')
@section('judul','Tambah Data Shift')

@section('content')
    <form method="post" action="{{ url('shift/insert') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <select class="form-control" name="karyawan_id">
                                @foreach($karyawan as $kar)
                                    <option value="{{ $kar->id }}">{{ $kar->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Shift</label>
                            <input type="date"
                                   class="form-control @error('tanggal_shift') is-invalid @enderror"
                                   value="{{ old('tanggal_shift') }}"
                                   name="tanggal_shift">
                            @error('tanggal_shift')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Shift</label>
                            <select class="form-control" name="jenis_shift">
                                <option value="pagi">Pagi</option>
                                <option value="siang">Siang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="time"
                                   class="form-control @error('waktu_mulai') is-invalid @enderror"
                                   value="{{ old('waktu_mulai') }}"
                                   name="waktu_mulai">
                            @error('waktu_mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Selesai</label>
                            <input type="time"
                                   class="form-control @error('waktu_selesai') is-invalid @enderror"
                                   value="{{ old('waktu_selesai') }}"
                                   name="waktu_selesai">
                            @error('waktu_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
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
