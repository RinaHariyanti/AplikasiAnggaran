@extends('layouts.dashboard.app')

@section('title', 'Pengeluaran')

@section('breadcrumb')
<x-dashboard::breadcrumb title="Pengeluaran" page="Pengeluaran" active="Pengeluaran" route="{{ route('pengeluaran.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
  <!-- cardheader -->
  <div class="card-header border-bottom-dashed align-items-center d-flex">
    <h4 class="card-title mb-0 flex-grow-1">Pengeluaran</h4>
    <div class="flex-shrink-0">
      <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form-add-menu">
        <i class="ri-add-line"></i>Add</button>
    </div>
  </div>
  <!-- end cardheader -->

  <!-- Hoverable Rows -->
  <table class="table table-hover table-nowrap mb-0">
    <thead>
      <tr>
        <th class="col">#</th>
        <th class="col">Tanggal Transaksi</th>
        <th class="col">Gambar Nota</th>
        <th class="col">Total Transaksi</th>
        <th class="col">RT</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pengeluarans as $pengeluaran )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$pengeluaran->tgl_transaksi}}</td>
        <td><a href="{{$pengeluaran->nota}}"><img src="{{$pengeluaran->nota}}" alt="" style="width: 10em"></a></td>
        <td>Rp. {{ number_format($pengeluaran->detail_pengeluaran_sum_amount, 0, ',', '.') }}</td>
        <td>{{ $pengeluaran->nama_rt->name }}</td>
        <td>
          <div class="dropdown">
            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ri-more-2-fill"></i>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-show-detail-{{ $pengeluaran->id }}">Detail</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-edit-menu-{{ $pengeluaran->id }}">
                  Edit
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-delete-menu-{{ $pengeluaran->id }}').submit()">
                  Delete
                </a>
              </li>
            </ul>

            @include('pengeluaran::components.form.modal.edit')
            @include('pengeluaran::components.form.modal.show')
            @include('pengeluaran::components.form.modal.delete')
          </div>

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
      {{$pengeluarans->links()}}
    </nav>
  </div>
</div>

@include('pengeluaran::components.form.modal.add')
@endsection
