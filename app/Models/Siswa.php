<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}