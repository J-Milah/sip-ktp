@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
                <!-- Export Buttons Create -->
                <a href="{{ url()->previous() ?? route('cetak') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
        
        </div>
        <div class="card-body">
            <form action="{{ route('cetakUpdate', $cetak->id) }}" method="POST" autocomplete="off">
                @csrf

                {{-- PENENTU ARAH REDIRECT --}}
                <input type="hidden" name="redirect_to" value="{{ $redirect_to }}">

                <div class="row mb-2">
                    <!-- Kode PAO -->
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Kode PAO :
                        </label>
                        <input type="text" name="kode_pao" class="form-control @error ('kode_pao') is-invalid @enderror" value="{{ $cetak->kode_pao }}">
                        @error('kode_pao')
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
                        <input type="text" name="nik_cetak" class="form-control @error ('nik_cetak') is-invalid @enderror" value="{{ $cetak->nik_cetak }}">
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
                        <input type="text" name="nama_cetak" class="form-control @error ('nama_cetak') is-invalid @enderror" value="{{ $cetak->nama_cetak }}">
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
                        <select name="id_lurah"
                            class="form-control @error('id_lurah') is-invalid @enderror">

                            <option disabled>
                                -- Pilih Kelurahan --
                            </option>

                            @foreach ($kelurahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_lurah', $cetak->id_lurah) == $item->id ? 'selected' : '' }}>
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
                        <input type="text" name="rt" class="form-control @error ('rt') is-invalid @enderror" value="{{ $cetak->rt }}">
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
                            <option disabled>-- Pilih Keterangan Cetak --</option>
                            <option value="PRR" {{ $cetak->ket_cetak == 'PRR' ? 'selected' : '' }}>PRR</option>
                            <option value="Perubahan Data" {{ $cetak->ket_cetak == 'Perubahan Data' ? 'selected' : '' }}>Perubahan Data</option>
                            <option value="Rusak" {{ $cetak->ket_cetak == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="Hilang" {{ $cetak->ket_cetak == 'Hilang' ? 'selected' : '' }}>Hilang</option>
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
                        <select name="status_cetak" class="form-control @error('status_cetak') is-invalid @enderror">
                            <option value="Proses" {{ $cetak->status_cetak == 'Proses' ? 'selected' : '' }}>
                                Proses
                            </option>
                            <option value="Selesai" {{ $cetak->status_cetak == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>

                        @error('status_cetak')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- Tanggal PAO -->
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span> 
                            Tanggal Penerimaan PAO :
                        </label>
                        <input type="date" name="tanggal_pao" class="form-control @error('tanggal_pao') is-invalid @enderror" value="{{ $cetak->tanggal_pao}}"></input>                        
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
                        <input type="date" name="tanggal_ambil" class="form-control @error ('tanggal_ambil') is-invalid @enderror" value="{{ $cetak->tanggal_ambil }}"></input>
                        @error('tangga')
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
                        <textarea name="tanda_terima" class="form-control @error ('tanda_terima') is-invalid @enderror" value="{{ $cetak->tanda_terima }}"></textarea>
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
                        <textarea name="keterangan" rows="3" class="form-control @error ('keterangan') is-invalid @enderror" value="{{ $cetak->keterangan }}"></textarea>
                        @error('keterangan')
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

