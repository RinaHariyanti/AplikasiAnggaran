@extends('layouts.dashboard.app')

@section('title', 'Pemasukan')

@section('breadcrumb')
<x-dashboard::breadcrumb title="invoice" page="invoice" active="invoice" route="{{ route('invoice.index') }}" />
@endsection

@push('plugin-css')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endpush

@push('plugin-script')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(function() {
    $("#datepicker").datepicker({
      format: 'yyyy-mm-dd',
    });
  });
</script>
@endpush

@section('content')
<div class="card card-height-100 table-responsive">
  <!-- cardheader -->
  <div class="card-header border-bottom-dashed align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">Pemasukan</h4>
    <div class="flex-shrink-0">
      <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form-add-menu">
        <i class="ri-add-line"></i>
        Add
      </button>
    </div>
  </div>
  <!-- end cardheader -->

  <!-- Hoverable Rows -->
  <table class="table table-hover table-nowrap mb-0">
    <thead>
      <tr>
        <th class="col">#</th>
        <th class="col">Nama</th>
        <th class="col">Tanggal Pembayaran</th>
        <th class="col">Nominal Pembayaran</th>
        <th class="col">RT</th>
        <th scope="col" class="col-1"></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($invoices as $invoice )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$invoice->name}}</td>
        <td>{{$invoice->date}}</td>
        <td>Rp {{number_format($invoice->amount,0,',', '.')}}</td>
        <td>{{ $invoice->nama_rt->name }}</td>
        <td>
          <div class="dropdown">
            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ri-more-2-fill"></i>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('invoice.index', $invoice->id) }}">Invoice</a></li>
              <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-edit-menu-{{ $invoice->id }}">
                  Edit
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-delete-menu-{{ $invoice->id }}').submit()">
                  Delete
                </a>
              </li>
            </ul>

            @include('invoice::components.form.modal.edit')
            @include('invoice::components.form.modal.delete')
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <th colspan="5" class="text-center">No data to display</th>
      </tr>
      @endforelse
    </tbody>
  </table>
  <div class="card-footer py-4">
    <nav aria-label="..." class="pagination justify-content-end">
      {{$invoices->links()}}
    </nav>
  </div>
</div>

@include('invoice::components.form.modal.add')
@endsection