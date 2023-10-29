@extends('layouts.dashboard')
@section('content')
    <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title">
                List Guru
            </h5>
            <div class="table-responsive text-nowrap h-50">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                            <th>Status Hari Ini</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                                1
                            </td>
                            <td>Jerry Milton</td>
                            <td>MTK
                            </td>
                            <td>
                                <span class="badge bg-label-success me-1">Hadir</span>
                                <span class="badge bg-label-primary me-1">Mengajar</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>Susan</td>
                            <td>IPA
                            </td>
                            <td>
                                <span class="badge bg-label-success me-1">Hadir</span>
                                <span class="badge bg-label-warning me-1">Piket</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center text-uppercase text-white bg-warning">No Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection