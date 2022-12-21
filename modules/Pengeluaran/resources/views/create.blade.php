@extends('layouts.dashboard.app')

@section('title', 'Pengeluaran')

@section('breadcrumb')
<x-dashboard::breadcrumb title="Pengeluaran" page="Pengeluaran" active="Create Item" route="{{ route('pengeluaran.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
  <!-- cardheader -->
  <div class="card-header border-bottom-dashed align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">Create Item</h4>
  </div>
  <form action="{{ route('pengeluaran.detail.store') }}" method="post">
    @csrf
    <input type="hidden" name="ref" value="{{ request()->get('ref') }}">

    <!-- end cardheader -->
    <table class="table table-hover table-nowrap mb-0">
      <thead>
        <tr>
          <th class="col">#</th>
          <th class="col">Produk Detail</th>
          <th class="col">Harga</th>
          <th class="col">quantity</th>
          <th class="col">amount</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="tbody">
      </tbody>
    </table>
    <!-- Hoverable Rows -->
    <div class="">
      <button type="button" id="btn-add-item" class="btn btn-soft-primary m-2">Add Item</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
  <div class="card-footer py-4">
    <nav aria-label="..." class="pagination justify-content-end">
      {{-- {{$pengeluarans->links()}} --}}
    </nav>
  </div>
</div>

@endsection

@push('script')
<script>
  $(document).ready(() => {

    $('#btn-add-item').click(() => {
      const html = `<tr> <td></td><td> <input type="text" name="name[]" id="name" placeholder="Name Item" class="form-control mb-2"> </td><td> <input type="number" name="price[]" id="price" placeholder="Price Item" class="form-control"> </td><td> <input type="number" name="qty[]" id="qty" placeholder="quantity" class="form-control"> </td><td> <input type="text" name="amount[]" id="amount" class="form-control" disabled> </td><td> <button id="btn-del-item" class="btn btn-soft-success">delete</button> </td></tr>`

      $(html).appendTo('#tbody')
    })

    $('#tbody').click((event) => {
      // delete row item
      event.target.id == 'btn-del-item' ? event.target.parentElement.parentElement.remove() : null
    })

    $('#tbody').change((event) => {
      // update amount
      if (event.target.id == 'price' || event.target.id == 'qty') {
        const price = parseInt(event.target.parentElement.parentElement.childNodes[3].childNodes[1].value);
        const qty = parseInt(event.target.parentElement.parentElement.childNodes[4].childNodes[1].value);
        const amount = event.target.parentElement.parentElement.childNodes[5].childNodes[1];

        amount.value = price * qty
      }
    })
  })

</script>
@endpush
