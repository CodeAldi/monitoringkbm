@extends('layouts.dashboard')
@section('content')
<div class="card h-100">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-8">
                <h5>List Siswa</h5>
            </div>
            <div class="col-md-4">
                {{-- <a href="#" class="btn btn-primary float-end"><i class='menu-icon bx bxs-plus-square'></i>Tambah
                    Siswa</a> --}}
            </div>
        </div>
        <div class="table-responsive text-nowrap h-50">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($siswa as $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kelas->tingkat.' '.$item->kelas->nama_kelas }}</td>
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
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
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