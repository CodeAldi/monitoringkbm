<?php

namespace App\Http\Controllers;

use Alert;
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
        return view('dashboard.admin.jurusan.index',[
            'title' => 'List Jurusan',
        ]);
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
