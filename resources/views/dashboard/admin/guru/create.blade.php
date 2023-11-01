@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Guru</h5>
        <form action="{{ route('admin.guru.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Guru</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="basic-default-name"
                        placeholder="Nama Guru..." required/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Mapel yang diampu</label>
                <div class="col-sm-10">
                    <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-select" required>
                        <option value="#" disabled hidden selected>Pilih Mata Pelajaran</option>
                        @forelse ($mapel as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                        @empty
                        <option value="#" disabled>Data Mata Pelajaran Masih Kosong</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="email..." required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="basic-default-name"
                        placeholder="Password" required />
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection