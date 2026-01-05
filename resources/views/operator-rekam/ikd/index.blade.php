@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-fw fa-mobile-alt mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <div class="mb-1 mr-2"> 
                <!-- Export Buttons Create -->
                <a href="{{ route('ikdCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i> Tambah Data IKD
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal</th> 
                            <th>NIK</th> 
                            <th>Nama</th>
                            <th>Operator</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ikd as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_ikd)->translatedFormat('l, d F Y') }}
                                </td>

                                <td>{{ $item->nik_ikd }}</td>
                                <td>{{ $item->nama_ikd }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('ikdEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    @include('operator-rekam/ikd/modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
