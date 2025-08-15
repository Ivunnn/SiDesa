@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <a href="residents/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Input Penduduk</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hovered table-striped mt-3">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Telepon</th>
                                <th>Status Penduduk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if ( count($residents)< 1)
                        <tbody>
                            <tr>
                                <td colspan="11" class="text-center">
                                    <p class="text-center text-danger pt-3">
                                        Tidak ada data
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                        @else
                        <tbody>
                            @foreach ($residents as $resident)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resident->nik }}</td>
                                    <td>{{ $resident->name }}</td>
                                    <td>{{ $resident->gender }}</td>
                                    <td>{{ $resident->birth_place }}, {{ $resident->birth_date }}</td>
                                    <td>{{ $resident->address }}</td>
                                    <td>{{ $resident->religion }}</td>
                                    <td>{{ $resident->marital_status }}</td>
                                    <td>{{ $resident->occupation }}</td>
                                    <td>{{ $resident->phone }}</td>
                                    <td>{{ $resident->status }}</td>
                                    <td>
                                        <div>
                                            </a>
                                            <a href="/residents/{{ $resident->id }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                            </a>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $resident->id }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-eraser"></i>
                                            Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.residents.confirmation-delete', ['resident' => $resident])
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection