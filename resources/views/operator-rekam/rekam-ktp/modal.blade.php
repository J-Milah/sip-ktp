<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }} ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left" style="font-weight: bold; font-size: 14px;">

        <!-- Nama -->
        <div class="row">
          <div class="col-6">Nama</div>
          <div class="col-6">: {{ $item->nama_rekam }}</div>
        </div>

        <!-- NIK -->
        <div class="row">
          <div class="col-6">NIK</div>
          <div class="col-6">: {{ $item->nik_rekam }}</div>
        </div>

        <!-- Tanggal Rekam -->
        <div class="row mt-2">
          <div class="col-6">Tanggal Rekam</div>
          <div class="col-6">
            :
              <span class="badge badge-info">{{ $item->tanggal_rekam }}</span>
          </div>
        </div>
       

      </div> <!-- /modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
          <i class="fas fa-times mr-2"></i>Tutup
        </button>

        <form action="{{ route('rekamDestroy', $item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash mr-2"></i>Hapus
          </button>
        </form>
      </div>

    </div> <!-- /modal-content -->
  </div> <!-- /modal-dialog -->
</div> <!-- /modal -->
