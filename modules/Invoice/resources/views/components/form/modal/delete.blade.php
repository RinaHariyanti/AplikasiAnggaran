<form action="{{ route('invoice.destroy', $invoice->id) }}" method="post" id="modal-form-delete-menu-{{ $invoice->id }}">
    @csrf
    @method('DELETE')
</form>
