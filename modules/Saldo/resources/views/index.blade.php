@extends('layouts.dashboard.app')

@section('title', 'Saldo')

@section('breadcrumb')
<x-dashboard::breadcrumb title="saldo" page="saldo" active="saldo" route="{{ route('saldo.index') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0 fw-light">Saldo</h3>
                        <h4 class="mt-4">Rp <span class="counter-value" data-target="{{ $saldo }}"> 0</span></h4>
                        <p class="mb-0 text-muted py-1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
