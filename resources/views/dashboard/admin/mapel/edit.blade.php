@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit New Mapel</h5>
        <form action="{{ route('admin.mapel.update',['id'=>$mapel->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama_mapel">Nama Mapel</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" required
                        value="{{ $mapel->nama_mapel }}" />
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection