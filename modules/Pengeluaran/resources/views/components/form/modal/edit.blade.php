<!-- Modals add menu -->
<div id="modal-form-edit-menu-{{$pengeluaran->id}}" class="modal fade" tabindex="-1" aria-labelledby="modal-form-edit-menu-{{$pengeluaran->id}}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('pengeluaran.update', $pengeluaran->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-menu-{{$pengeluaran->id}}-label">Edit Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" id="date" value="{{$pengeluaran->tgl_transaksi}}">
                        <x-form.validation.error name="date"/>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Scan Nota</label>
                        <input type="file" class="form-control" placeholder="Scan Nota" name="image" id="image" value="{{$pengeluaran->nota}}">
                        <x-form.validation.error name="image"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
