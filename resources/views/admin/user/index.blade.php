@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-fw fa-user mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <!-- Export Buttons Create -->
                <a href="{{ route('userCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i> Tambah User
                </a>
            </div>
        
        </div>
        <div class="card-body">
            <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>
                                                    <i class="fas fa-cog"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>      
                                                    <td>
                                                        <span class="badge badge-primary">
                                                            {{ $item->nik }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($item->jabatan == 'Admin')
                                                            <span class="badge badge-dark">
                                                                {{ $item->jabatan }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-info">
                                                                {{ $item->jabatan }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($item->status_user == 'Active')
                                                            <span class="badge badge-success">
                                                                {{ $item->status_user }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">
                                                                {{ $item->status_user }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('userEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
        </div>
    </div>
@endsection

