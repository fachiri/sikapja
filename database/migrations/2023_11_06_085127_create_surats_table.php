<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('no_pendaftar', 16);
            $table->string('nik', 16);
            $table->string('nama_pengantar_kerja', 36);
            $table->string('nama_ibu', 36);
            $table->string('nama_lengkap', 36);
            $table->string('tempat_lahir', 36);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->string('agama');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('jln');
            $table->string('rtrw');
            $table->string('kel');
            $table->string('kec');
            $table->string('kab');
            $table->string('provinsi');
            $table->integer('pos');
            $table->string('telp', 12);
            $table->string('email');
            $table->string('pendidikan');
            $table->string('jurusan')->nullable();
            $table->string('keterampilan')->nullable();
            $table->integer('tahun_lulus');
            $table->integer('sd_tahun')->nullable();
            $table->integer('smp_tahun')->nullable();
            $table->integer('sma_tahun')->nullable();
            $table->string('jabatan_1')->nullable();
            $table->string('uraian_tugas_1')->nullable();
            $table->integer('lama_kerja_1')->nullable();
            $table->string('pemberi_kerja_1')->nullable();
            $table->string('jabatan_2')->nullable();
            $table->string('uraian_tugas_2')->nullable();
            $table->integer('lama_kerja_2')->nullable();
            $table->string('pemberi_kerja_2')->nullable();
            $table->string('jabatan_dalam_negeri')->nullable();
            $table->string('jabatan_luar_negeri')->nullable();
            $table->string('upah_yang_diinginkan');
            $table->string('bahasa_asing')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
