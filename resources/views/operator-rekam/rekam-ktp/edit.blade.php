@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card"> 
        <div class="card-header">
                <!-- Export Buttons Create -->
                <a href="{{ route('rekam') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
        
        </div>
        <div class="card-body">
            <form action="{{ route('rekamUpdate', $rekam->id) }}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-2">
                    <!-- Nama -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Nama :
                        </label>
                        <input type="text" name="nama_rekam" class="form-control @error ('nama_rekam') is-invalid @enderror" value="{{ $rekam->nama_rekam }}">
                        @error('nama_rekam')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            NIK :
                        </label>
                        <input type="text" name="nik_rekam" class="form-control @error ('nik_rekam') is-invalid @enderror" value="{{ $rekam->nik_rekam }}">
                        @error('nik_rekam')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>


                <div class="row mb-2">
                    <!-- Kelurahan -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Kelurahan :
                        </label>
                        <select name="id_lurah"
                            class="form-control @error('id_lurah') is-invalid @enderror">

                            <option disabled>
                                -- Pilih Kelurahan --
                            </option>

                            @foreach ($kelurahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_lurah', $rekam->id_lurah) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kelurahan }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_lurah')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- RT -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            RT :
                        </label>
                        <input type="text" name="rt" class="form-control @error ('rt') is-invalid @enderror" value="{{ $rekam->rt }}">
                        @error('rt')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Tanggal Rekam -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Tanggal Rekam :
                        </label>
                        <input type="date" name="tanggal_rekam" class="form-control @error('tanggal_rekam') is-invalid @enderror" value="{{ $rekam->tanggal_rekam, date('Y-m-d') }}">                                                
                        @error('tanggal_rekam')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    
                    <!-- Alamat -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            Alamat :
                        </label>
                        <input type="text" name="alamat" class="form-control @error ('alamat') is-invalid @enderror" value="{{ $rekam->alamat }}">
                        @error('alamat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-sm btn-warning text-dark">
                        <i class="fas fa-save mr-2"></i> Update
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

