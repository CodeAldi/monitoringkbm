@extends('layouts.dashboard')
@section('content')
@if (session('success'))
<div class="bs-toast toast show bg-success toast-placement-ex m-4 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Sukses</div>
        {{-- <small>11 mins ago</small> --}}
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ session('success') }}
    </div>
</div>
@endif
<div class="card h-100">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-8">
                <h5>List Mata Pelajaran</h5>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary float-end"><i
                        class='menu-icon bx bxs-plus-square'></i>Tambah
                    Mata Pelajaran</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap h-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($mapel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mapel }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route("admin.mapel.edit",["id"=>$item->id]) }}"><i class="bx bx-edit-alt me-2"></i>
                                            Edit</a>
                                            <form action="{{ route("admin.mapel.destroy",["mapel"=>$item]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item btn" data-confirm-delete="true" ><i class="bx bx-trash me-2"></i>
                                                    Delete</button>
                                            </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-uppercase text-white bg-warning">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('page-js')
<script src="{{ asset('assets/js/ui-toasts.js') }}"></script>
@endpush