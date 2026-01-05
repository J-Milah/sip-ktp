@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
                <!-- Button kembali ke halaman index IKD -->
                <a href="{{ route('ikd') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
        
        </div>
        <div class="card-body">
            <form action="{{ route('ikdStore') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-2">
                    <!-- NIK -->
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            NIK :
                        </label>
                        <input type="text" name="nik_ikd" class="form-control @error ('nik_ikd') is-invalid @enderror" value="{{ old('nik_ikd') }}">
                        @error('nik_ikd')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- NAma -->
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Nama :
                        </label>
                        <input type="text" name="nama_ikd" class="form-control @error ('nama_ikd') is-invalid @enderror" value="{{ old('nama_ikd') }}">
                        @error('nama_ikd')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Tanggal IKD -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Tanggal :
                        </label>
                        <input type="date" name="tanggal_ikd" class="form-control @error('tanggal_ikd') is-invalid @enderror" value="{{ old('tanggal_ikd', date('Y-m-d')) }}">                                                
                        @error('tanggal_ikd')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

