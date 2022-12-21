<form action="{{ route('rt.destroy', $Rt->id) }}" method="post" id="modal-form-delete-menu-{{ $Rt->id }}">
    @csrf
    @method('DELETE')
</form>
