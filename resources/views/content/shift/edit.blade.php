@extends('layout.main')
@section('judul','Edit Data Shift')

@section('content')
    <form method="post" action="{{ route('shift.update', $shift->id) }}">
        @csrf
        @method('POST') <!-- pastikan method POST -->
        <input type="hidden" name="id" value="{{ $shift->id }}"/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID Karyawan</label>
                            <input type="text"
                                   class="form-control @error('karyawan_id') is-invalid @enderror"
                                   value="{{ $shift->karyawan_id }}"
                                   name="karyawan_id">
                            @error('karyawan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Shift</label>
                            <input type="date"
                                   class="form-control @error('tanggal_shift') is-invalid @enderror"
                                   value="{{ $shift->tanggal_shift }}"
                                   name="tanggal_shift">
                            @error('tanggal_shift')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Shift</label>
                            <select class="form-control @error('jenis_shift') is-invalid @enderror" name="jenis_shift">
                                <option value="pagi" @if($shift->jenis_shift == 'pagi') selected @endif>Pagi</option>
                                <option value="siang" @if($shift->jenis_shift == 'siang') selected @endif>Siang</option>
                            </select>
                            @error('jenis_shift')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="time"
                                   class="form-control @error('waktu_mulai') is-invalid @enderror"
                                   value="{{ $shift->waktu_mulai }}"
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
                                   value="{{ $shift->waktu_selesai }}"
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
