<!-- Modal Delete -->
<div class="modal fade" id="modalCetakDestroy{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Hapus {{ $title }} ?</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left">
        <div class="row">
          <div class="col-6">Kode PAO</div>
          <div class="col-6">: {{ $item->kode_pao }}</div>
        </div>

        <div class="row mt-2">
          <div class="col-6">NIK</div>
          <div class="col-6">:
            <span class="badge badge-primary">{{ $item->nik_cetak }}</span>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-6">Nama</div>
          <div class="col-6">:
            <span class="badge badge-info">{{ $item->nama_cetak }}</span>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
          <i class="fas fa-times mr-2"></i>Tutup
        </button>

        <form action="{{ route('cetakDestroy', $item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash mr-2"></i> Hapus
          </button>
        </form>
      </div>

    </div>
  </div>
</div>
