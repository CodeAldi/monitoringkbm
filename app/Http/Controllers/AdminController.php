<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Jurusan;
use App\Models\Mapel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // user admin

    // bagian guru start
    function guruIndex() : View {
        return view('dashboard.admin.guru.index',[
            'title' => 'List Guru',
        ]);
    }
    // bagian guru end
    // bagian siswa start
    function siswaIndex() : View {
        return view('dashboard.admin.siswa.index',[
            'title' => 'List Siswa',
        ]);
    }
    // bagian siswa end
    // bagian mapel start
    function mapelIndex() : View {
        $mapel = Mapel::latest()->paginate(10);
        confirmDelete('Delete Mata Pelajaran','Apakah Anda Yakin ?');
        return view('dashboard.admin.mapel.index')
        ->with('title','List Mapel')
        ->with(compact('mapel'));
    }
    function mapelCreate(): View {
        return view('dashboard.admin.mapel.create',[
            'title' => 'Create Mapel'
        ]);
    }
    function mapelStore(Request $request) : RedirectResponse {
        $validatedData = $request->validate([
            'nama_mapel' => 'required|string|max:255|unique:mata_pelajaran',
        ]);
        $mapel = new Mapel;
        $mapel->nama_mapel = $validatedData['nama_mapel'];
        $mapel->save();
        return redirect()->route('admin.mapel.index')->with('success','Mata Pelajaran Berhasil DiTambahkan');
    }
    function mapelEdit($id) : View {
        $mapel = Mapel::find($id);
        return view('dashboard.admin.mapel.edit', [
            'title' => 'Edit Mapel',
            'mapel' => $mapel,
        ]);
    }
    function mapelUpdate(Request $request,$id) : RedirectResponse {
        $mapel = Mapel::find($id);
        $validatedData = $request->validate([
            'nama_mapel' => 'required|string|max:255|unique:mata_pelajaran',
        ]);
        $mapel->nama_mapel = $validatedData['nama_mapel'];
        $mapel->save();
        return redirect()->route('admin.mapel.index')->with('success', 'Mata Pelajaran Berhasil DiEdit');
    }
    function mapelDestroy(Mapel $mapel) {
        $mapel->delete();
        alert()->success('Success!','Mata Pelajaran Deleted');
        return redirect()->route('admin.mapel.index');
    }
    // bagian mapel end
    // bagian jurusan start
    function jurusanIndex(): View {
        $jurusan = Jurusan::latest()->paginate(10);
        
        return view('dashboard.admin.jurusan.index',[
            'title' => 'List Jurusan',
            'jurusan'=>$jurusan,
        ]);
    }
    function jurusanCreate() : View {
        return view('dashboard.admin.jurusan.create',[
            'title' => 'Create Jurusan'
        ]);
    }
    function jurusanStore(Request $request) : RedirectResponse {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan',
        ]);
        $jurusan = new jurusan;
        $jurusan->nama_jurusan = $validatedData['nama_jurusan'];
        $jurusan->save();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan Berhasil DiTambahkan');
    }
    function jurusanEdit($id) : View {
        $jurusan = Jurusan::find($id);
        return view('dashboard.admin.jurusan.edit',[
            'title'=>'Edit Jurusan',
            'jurusan' => $jurusan,
        ]);
    }
    function jurusanUpdate(Request $request,$id) : RedirectResponse {
        $jurusan = Jurusan::find($id);
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan',
        ]);
        $jurusan->nama_jurusan = $validatedData['nama_jurusan'];
        $jurusan->save();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan Berhasil DiEdit');
    }
    function jurusanDestroy(Jurusan $jurusan){
        // $jurusan->delete();
        // alert()->success('Success!', 'Jurusan Deleted');
        return redirect()->route('admin.jurusan.index');
    }
    // bagian jurusan end
    // bagian kelas start
    function kelasIndex(): view {
        return view('dashboard.admin.kelas.index',[
            'title' => 'List Kelas',
        ]);
    }
    // bagian kelas end
}
