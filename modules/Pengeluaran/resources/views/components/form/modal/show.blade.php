<!-- Modals add menu -->
<div id="modal-form-show-detail-{{ $pengeluaran->id }}" class="modal" tabindex="-1" aria-labelledby="modal-form-show-detail-{{ $pengeluaran->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-show-detail-{{ $pengeluaran->id }}-label">Detail Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <table class="table table-hover table-nowrap mb-0">
                <thead>
                    <tr>
                        <th class="col">#</th>
                        <th class="col">Item</th>
                        <th class="col">Price</th>
                        <th class="col">Qty</th>
                        <th class="col">Amount</th>
                        <th scope="col" class="col-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengeluaran->detail_pengeluaran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->amount, 0, ',', '.') }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#modal-form-detail-edit-menu-{{ $item->id }}" aria-controls="modal-form-detail-edit-menu-{{ $item->id }}">Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-detail-delete-menu-{{ $item->id }}').submit()">
                                            Delete
                                        </a>
                                    </li>
                                </ul>

                                @include('pengeluaran::components.form.modal.detail.edit')

                                <form action="{{ route('pengeluaran.detail.destroy', $item->id) }}" method="post" id="modal-form-detail-delete-menu-{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('pengeluaran.create', 'ref=' . $pengeluaran->id) }}" type="button" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
</div>