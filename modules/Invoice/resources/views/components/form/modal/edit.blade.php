<!-- Modals add menu -->
<div id="modal-form-edit-menu-{{ $invoice->id }}" class="modal fade" tabindex="-1" aria-labelledby="modal-form-edit-menu-{{ $invoice->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('invoice.update', $invoice->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-menu-{{ $invoice->id }}-label">Edit Pemasukan ({{ $invoice->name }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Menu Name" name="name" value="{{ $invoice->name }}">
                        <x-form.validation.error name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" placeholder="Date" name="date" id="date" value="{{$invoice->date}}">
                        <x-form.validation.error name="date"/>
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Pembayaran</label>
                        <input type="number" class="form-control" id="nominal" placeholder="Nominal Pembayaran" name="amount" value="{{$invoice->amount}}">
                        <x-form.validation.error name="nominal"/>
                    </div>
                    <div class="mb-3">
                        <label for="nama_rt_id" class="form-label">Nama Rt</label>
                        <select name="nama_rt_id" id="nama_rt_id" class="form-select">
                            @foreach ($rts as $rt)
                                <option @checked($rt->id == $invoice->nama_rt_id) value="{{ $rt->id }}">{{ $rt->name }}</option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="nama_rt_id"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update">Update</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
