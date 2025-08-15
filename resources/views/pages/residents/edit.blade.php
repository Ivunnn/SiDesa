@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('residents.update', $resident->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        {{-- <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                value="{{ old('nik', $resident->nik) }}" maxlength="16">
                            @error('nik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $resident->name) }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="Laki-Laki" {{ old('gender', $resident->gender) == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('gender', $resident->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                id="birth_date" name="birth_date" value="{{ old('birth_date', $resident->birth_date) }}">
                            @error('birth_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror"
                                id="birth_place" name="birth_place" value="{{ old('birth_place', $resident->birth_place) }}">
                            @error('birth_place')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" rows="3">{{ old('address', $resident->address) }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <select class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion">
                                <option value="">Pilih</option>
                                <option value="Islam" {{ old('religion', $resident->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion', $resident->religion) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('religion', $resident->religion) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('religion', $resident->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion', $resident->religion) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('religion', $resident->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="marital_status">Status Perkawinan</label>
                            <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status">
                                <option value="Belum Kawin" {{ old('marital_status', $resident->marital_status) == 'Belum Kawin' ? 'selected' : '' }}>Belum Menikah</option>
                                <option value="Sudah Kawin" {{ old('marital_status', $resident->marital_status) == 'Sudah Kawin' ? 'selected' : '' }}>Menikah</option>
                                <option value="Cerai" {{ old('marital_status', $resident->marital_status) == 'Cerai' ? 'selected' : '' }}>Bercerai</option>
                                <option value="Janda/Duda" {{ old('marital_status', $resident->marital_status) == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
                            </select>
                            @error('marital_status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror"
                                id="occupation" name="occupation" value="{{ old('occupation', $resident->occupation) }}">
                            @error('occupation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone', $resident->phone) }}">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="Aktif" {{ old('status', $resident->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Pindah" {{ old('status', $resident->status) == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                <option value="Meninggal" {{ old('status', $resident->status) == 'Meninggal' ? 'selected' : '' }}>Almarhum</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end" style="gap: 10px;">
                            <a href="{{ route('residents.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection