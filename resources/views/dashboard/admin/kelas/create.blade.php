@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Kelas</h5>
        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama_kelas">Nama kelas</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas"
                        placeholder="Nama kelas..." required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama_kelas">Tingkat kelas</label>
                <div class="col-sm-10">
                    <select name="tingkat_kelas" class="form-select @error('tingkat_kelas') invalid @enderror" required>
                        <option value="0" hidden>Pilih Tingkat Kelas</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    @error('tingkat_kelas')
                    <div class="form-text text-capitalize text-danger">pilih salah satu tingkat kelas</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jurusan">Jurusan</label>
                <div class="col-sm-10">
                    <select name="jurusan" class="form-select @error('jurusan') invalid @enderror" required>
                        <option value="0" hidden>Pilih Jurusan</option>
                        @forelse ($jurusan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                        @empty
                        <option value="#" disabled>Data Jurusan Tidak Di Temukan</option>
                        @endforelse
                    </select>
                    @error('jurusan')
                    <div class="form-text text-capitalize text-danger">pilih salah satu jurusan</div>
                    @enderror
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