<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftar',
        'nik',
        'nama_pengantar_kerja',
        'nama_ibu',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status',
        'agama',
        'tinggi_badan',
        'berat_badan',
        'jln',
        'rtrw',
        'kel',
        'kec',
        'kab',
        'provinsi',
        'pos',
        'telp',
        'email',
        'pendidikan',
        'jurusan',
        'keterampilan',
        'tahun_lulus',
        'sd_tahun',
        'smp_tahun',
        'sma_tahun',
        'jabatan_1',
        'uraian_tugas_1',
        'lama_kerja_1',
        'pemberi_kerja_1',
        'jabatan_2',
        'uraian_tugas_2',
        'lama_kerja_2',
        'pemberi_kerja_2',
        'jabatan_dalam_negeri',
        'jabatan_luar_negeri',
        'upah_yang_diinginkan',
        'bahasa_asing',
        'lama_lulus_pendidikan',
        'lowongan'
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }
}
