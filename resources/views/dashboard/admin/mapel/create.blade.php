@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Mapel</h5>
        <form action="{{ route('admin.mapel.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama_mapel">Nama Mapel</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" required placeholder="Nama Mapel..." />
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