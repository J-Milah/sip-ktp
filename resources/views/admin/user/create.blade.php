@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
                <!-- Export Buttons Create -->
                <a href="{{ route('user') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
        
        </div>
        <div class="card-body">
            <form action="{{ route('userStore') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-2">
                    <!-- Nama -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Nama :
                        </label>
                        <input type="text" name="nama" class="form-control @error ('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            NIK (Username) :
                        </label>
                        <input type="text" name="nik" class="form-control @error ('nik') is-invalid @enderror" value="{{ old('nik') }}">
                        @error('nik')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Jabatan -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Jabatan :
                        </label>
                        <select name="jabatan" class="form-control @error ('jabatan') is-invalid @enderror">
                            <option selected disabled>-- Pilih Jabatan --</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator-Cetak">Operator-Cetak</option>
                            <option value="Operator-Rekam">Operator-Rekam</option>
                        </select>
                        @error('jabatan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Status User -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Status User :
                        </label>
                        <select name="status_user" class="form-control @error ('status_user') is-invalid @enderror" value="{{ old('status_user') }}">
                            <option value="Active" selected>Active</option>
                            <option value="Non-Active">Non-Active</option>
                        </select>
                        @error('status_user')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Password -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Password :
                        </label>
                        <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Password konfirmasi -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Password Konfirmasi :
                        </label>
                        <input type="password" name="password_confirmation" class="form-control @error ('password') is-invalid @enderror">
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

