<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // user admin

    // bagian guru start
    function guruIndex() {
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
        return view('dashboard.admin.mapel.index',[
            'title' => 'List Mapel'
        ]);
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
