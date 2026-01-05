@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
                <!-- Export Buttons Create -->
                <a href="{{ route('cetak') }}" class="btn btn-success btn-sm"> <!-- Yang ini -->
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
        
        </div>
        <div class="card-body">
            <form action="{{ route('cetakStore') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-2">
                    <!-- Kode PAO -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Kode PAO :
                        </label>
                        <input type="text" name="kode_pao" class="form-control @error ('kode_pao') is-invalid @enderror" value="{{ old('kode_pao') }}">
                        @error('kode_pao')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            NIK :
                        </label>
                        <input type="text" name="nik_cetak" class="form-control @error ('nik_cetak') is-invalid @enderror" value="{{ old('nik_cetak') }}">
                        @error('nik_cetak')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Nama -->
                    <div class="col-xl-12 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Nama :
                        </label>
                        <input type="text" name="nama_cetak" class="form-control @error ('nama_cetak') is-invalid @enderror" value="{{ old('nama_cetak') }}">
                        @error('nama_cetak')
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
                        <select name="id_lurah" class="form-control @error ('id_lurah') is-invalid @enderror" value="{{ old('id_lurah') }}">
                            <option disabled {{ old('id_lurah') ? '' : 'selected' }}>
                                -- Pilih Kelurahan --
                            </option>
                            @foreach ($kelurahan as $item)
                                <option value="{{ $item->id }}" {{ old('id_lurah') == $item->id ? 'selected' : '' }}>
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
                        <input type="text" name="rt" class="form-control @error ('rt') is-invalid @enderror" value="{{ old('rt') }}">
                        @error('rt')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Keterangan Cetak -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Keterangan Cetak :
                        </label>
                        <select name="ket_cetak" class="form-control @error('ket_cetak') is-invalid @enderror">
                            <option disabled {{ old('ket_cetak') ? '' : 'selected' }}>
                                -- Pilih Keterangan Cetak --
                            </option>

                            <option value="PRR" {{ old('ket_cetak') == 'PRR' ? 'selected' : '' }}>
                                PRR
                            </option>

                            <option value="Perubahan Data" {{ old('ket_cetak') == 'Perubahan Data' ? 'selected' : '' }}>
                                Perubahan Data
                            </option>

                            <option value="Rusak" {{ old('ket_cetak') == 'Rusak' ? 'selected' : '' }}>
                                Rusak
                            </option>

                            <option value="Hilang" {{ old('ket_cetak') == 'Hilang' ? 'selected' : '' }}>
                                Hilang
                            </option>
                        </select>


                        @error('ket_cetak')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Status Cetak -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Status Cetak :
                        </label>
                        <select name="status_cetak" class="form-control @error ('status_cetak') is-invalid @enderror" value="{{ old('status_cetak') }}">
                            <option value="Proses" selected>Proses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        @error('status_cetak')
                            <small class="text-danger"> 
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Tanggal Cetak -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Tanggal Penerimaan PAO :
                        </label>
                        <input type="date" name="tanggal_pao" class="form-control @error('tanggal_pao') is-invalid @enderror" value="{{ old('tanggal_pao', date('Y-m-d')) }}">                        
                        @error('tanggal_pao')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div> 

                    <!-- Tanggal Ambil -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label"> 
                            Tanggal Ambil :
                        </label>
                        <input type="date" name="tanggal_ambil" class="form-control @error ('tanggal_ambil') is-invalid @enderror" value="{{ old('tanggal_ambil',  date('Y-m-d')) }}"></input>
                        @error('tanggal_ambil')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Tanda Terima -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label"> 
                            Tanda Terima :
                        </label>
                        <textarea name="tanda_terima" class="form-control @error ('tanda_terima') is-invalid @enderror" value="{{ old('tanda_terima') }}"></textarea>
                        @error('')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <!-- Keterangan Catatan -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label"> 
                            Keterangan :
                        </label>
                        <textarea name="keterangan" rows="3" class="form-control @error ('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}"></textarea>
                        @error('keterangan')
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

