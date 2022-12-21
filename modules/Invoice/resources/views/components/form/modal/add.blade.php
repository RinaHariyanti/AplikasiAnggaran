<!-- Modals add menu -->
<div id="modal-form-add-menu" class="modal fade" tabindex="-1" aria-labelledby="modal-form-add-menu-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('invoice.store') }}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-menu-label">Add Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Invoice Name" name="name">
                        <x-form.validation.error name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" id="date" >
                        <x-form.validation.error name="date"/>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Pembayaran</label>
                        <input type="number" class="form-control" id="nominal" placeholder="Nominal Pembayaran" name="amount">
                        <x-form.validation.error name="nominal"/>
                    </div>
                    <div class="mb-3">
                        <label for="nama_rt_id" class="form-label">Nama Rt</label>
                        <select name="nama_rt_id" id="nama_rt_id" class="form-select">
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="nama_rt_id"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save">Save</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
