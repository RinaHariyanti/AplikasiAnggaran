<form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="post" id="modal-form-delete-menu-{{ $pengeluaran->id }}">
    @csrf
    @method('DELETE')
</form>
