@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-fw fa-id-card mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        
        <div class="card-body">
            <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Tanggal Penerimaan PAO</th>
                                                <th>Tanggal Cetak KTP</th>
                                                <th>Tanggal Ambil KTP</th>
                                                <th>Kode PAO</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Lurah</th>
                                                <th>RT</th>
                                                <th>Keterangan Cetak</th>
                                                <th>Status Cetak</th>
                                                <th>Tanda Terima</th>
                                                <th>Keterangan</th>
                                                <th>Operator</th>
                                                <th>
                                                    <i class="fas fa-cog"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach ($cetak as $item)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->tanggal_pao)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>
                                                        {{ \Carbon\Carbon::parse($item->tanggal_ambil)->translatedFormat('d F Y') }}
                                                    </td>

                                                    <td>{{ $item->kode_pao }}</td>
                                                    <td>{{ $item->nik_cetak }}</td>
                                                    <td>{{ $item->nama_cetak }}</td>
                                                    <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                                                    <td>{{ $item->rt }}</td>  
                                                    <td>
                                                        @if ($item->ket_cetak == 'PRR')
                                                            <span class="badge badge-info">
                                                                {{ $item->ket_cetak }}
                                                            </span>

                                                        @elseif ($item->ket_cetak == 'Perubahan Data')
                                                            <span class="badge badge-warning">
                                                                {{ $item->ket_cetak }}
                                                            </span>

                                                        @elseif ($item->ket_cetak == 'Rusak')
                                                            <span class="badge badge-light">
                                                                {{ $item->ket_cetak }}
                                                            </span>

                                                        @elseif ($item->ket_cetak == 'Hilang')
                                                            <span class="badge badge-dark">
                                                                {{ $item->ket_cetak }}
                                                            </span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($item->status_cetak == 'Proses')
                                                            <span class="badge badge-danger">
                                                                {{ $item->status_cetak }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success">
                                                                {{ $item->status_cetak }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>{{ $item->tanda_terima }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ $item->user->nama ?? '-' }}</td>

                                                    <td class="text-center">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('cetakEdit', ['id' => $item->id, 'from' => 'riwayat']) }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @include('operator-cetak/cetak-ktp/modal')    
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
        </div>
    </div>
@endsection

