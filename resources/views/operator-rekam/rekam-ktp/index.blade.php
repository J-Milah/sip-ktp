@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-fw fa-id-card mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        {{-- TOMBOL TAMBAH HANYA UNTUK OPERATOR --}}
                @if (Auth::user()->jabatan !== 'Admin')
        <div class="card-header">
            <div class="mb-1 mr-2">
                <a href="{{ route('rekamCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i> Tambah Rekam KTP 
                </a> 
                
            </div>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Tanggal Rekam</th> 
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Lurah</th>
                                                <th>RT</th>
                                                <th>Alamat</th>
                                                <th>Operator</th>
                                                <th>
                                                    <i class="fas fa-cog"></i> 
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rekam as $item)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->tanggal_rekam)->translatedFormat('l, d F Y') }}
                                                    </td>

                                                    <td>{{ $item->nama_rekam }}</td>
                                                    <td>{{ $item->nik_rekam }}</td>
                                                    <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                                                    <td>{{ $item->rt }}</td>
                                                    <td>{{ $item->alamat }}</td>  
                                                    <td>{{ $item->user->nama ?? '-' }}</td>
                                                                                                       
                                                    <td class="text-center">
                                                        <a href="{{ route('rekamEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        @include('operator-rekam/rekam-ktp/modal')    
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
        </div>
    </div>
@endsection

