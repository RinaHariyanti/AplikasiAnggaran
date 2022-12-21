<!-- Modals add menu -->
<div id="modal-form-add-menu" class="modal" tabindex="-1" aria-labelledby="modal-form-add-menu-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('pengeluaran.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-menu-label">Add Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" id="date" >
                        <x-form.validation.error name="date"/>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Scan Nota</label>
                        <input type="file" class="form-control" placeholder="Scan Nota" name="image" id="image" >
                        <x-form.validation.error name="image"/>
                    </div>

                    <div class="mb-3">
                        <label for="nama_rt" class="form-label">Nama Rt</label>
                        <select name="nama_rt" id="nama_rt" class="form-select">
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="nama_rt"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
