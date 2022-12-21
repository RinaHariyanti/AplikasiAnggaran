@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('breadcrumb')
<x-dashboard::breadcrumb title="Dashboard" page="Dashboard" active="Dashboard" route="{{ route('dashboard.index') }}" />
@endsection


@section('content')
<div class="row">
    @foreach ($rts as $rt)
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="row">
                <div class="col-3 ">
                    <h5 class=" ms-3 pt-2 mb-0 fw-light">{{ $rt->name }}</h5>
                </div>
                <div class="col-9  ">
                    <div class="dropdown pt-2 pe-2  d-flex justify-content-end">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('invoice.index', ['rt' => $rt->id]) }}">
                                    Pemasukan
                                </a>
                            </li>
                            <li>
                                <a class=" dropdown-item" href="{{ route('pengeluaran.index', ['rt' => $rt->id]) }}">
                                    Pengeluaran
                                </a>
                            </li>
                        </ul>

                        {{-- @include('invoice::components.form.modal.edit') --}}
                        {{-- @include('invoice::components.form.modal.delete') --}}
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mt-4">Rp. <span class="counter-value" data-target="{{ ((int) $rt->payment_recap_sum_amount - (int) $rt->expense($rt->referensi)) }}"> 0</span></h4>
                        <p class="mb-0 text-muted py-1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection