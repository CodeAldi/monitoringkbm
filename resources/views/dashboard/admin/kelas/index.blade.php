@extends('layouts.dashboard')
@section('content')
@if (session('success'))
<div class="bs-toast toast show bg-success toast-placement-ex m-4 top-0 end-0" role="alert" aria-live="assertive"
    aria-atomic="true">
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
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-8">
                <h5>List Kelas</h5>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary float-end"><i class='menu-icon bx bxs-plus-square'></i>Tambah
                    Kelas</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Tingkat Kelas</th>
                        <th>Jurusan Kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($kelas as $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $item->nama_kelas }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->jurusan->nama_jurusan }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-2"></i>
                                        Edit</a>
                                    <form action="{{ route('admin.kelas.destroy',['kelas'=>$item]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="dropdown-item btn" onclick="konfirmasi()"><i class="bx bx-trash me-2"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-uppercase text-white bg-warning">No Data</td>
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

<script>
    function konfirmasi() {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        })
    }
</script>