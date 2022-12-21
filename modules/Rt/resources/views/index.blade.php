@extends('layouts.dashboard.app')

@section('title', 'RT')

@section('breadcrumb')
<x-dashboard::breadcrumb title="rt" page="rt" active="rt" route="{{ route('rt.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
    <!-- cardheader -->
    <div class="card-header border-bottom-dashed align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">RT</h4>
        <div class="flex-shrink-0">
          <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form-add-menu">
            <i class="ri-add-line"></i>
            Add
          </button>
        </div>
    </div>
      <!-- end cardheader -->

      <table class="table table-hover table-nowrap mb-0">
        <thead>
            <tr>
                <th class="col">#</th>
                <th class="col">Nama Rt</th>
                <th scope="col" class="col-1"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($NamaRt as $Rt )
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$Rt->name}}</td>
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-more-2-fill"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                          <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-edit-menu-{{ $Rt->id }}">
                              Edit
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-delete-menu-{{ $Rt->id }}').submit()">
                              Delete
                            </a>
                          </li>
                        </ul>

                        @include('rt::components.form.modal.delete')
                        @include('rt::components.form.modal.edit')
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
            {{$NamaRt->links()}}
        </nav>
    </div>
</div>
@include('rt::components.form.modal.add')
@endsection
