<!-- right offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="modal-form-detail-edit-menu-{{ $item->id }}" aria-labelledby="modal-form-detail-edit-menu-{{ $item->id }}-Label">
  <div class="offcanvas-header">
    <h5 id="modal-form-detail-edit-menu-{{ $item->id }}-Label">Edit detail ({{ $item->name }})</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="{{ route('pengeluaran.detail.update', $item->id) }}" method="post">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $item->name }}">
        <x-form.validation.error name="name" />
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" placeholder="Price" name="price" id="price" value="{{ $item->price }}">
        <x-form.validation.error name="price" />
      </div>

      <div class="mb-3">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" class="form-control" placeholder="Qty" name="qty" id="qty" value="{{ $item->qty }}">
        <x-form.validation.error name="qty" />
      </div>

      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="text" class="form-control" placeholder="Amount" id="amount" value="{{ $item->amount }}" disabled>
      </div>

      <button type="submit" class="btn btn-primary">Update</button>

    </form>
  </div>
</div>

@push('script')
<script>
  $(document).ready(() => {

    $("#modal-form-detail-edit-menu-{{ $item->id }}").change((event) => {
      // update amount
      if (event.target.id == 'price' || event.target.id == 'qty') {
        const price = parseInt(event.target.parentElement.parentNode[3].value)
        const qty = parseInt(event.target.parentElement.parentNode[4].value)
        const amount = event.target.parentElement.parentNode[5]

        amount.value = price * qty
      }
    })

  })

</script>
@endpush
