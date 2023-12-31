<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::orderBy('created_at', 'desc')->get();

        return view('pages.surat.index', compact('surat'));
    }

    public function create()
    {
        return view('pages.surat.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "tanggal_pendaftaran" => "required|date",
            "no_pendaftar" => "required|numeric|digits:16",
            "nik" => "required|numeric|digits:16",
            "nama_pengantar_kerja" => "required|max:36",
            "nama_ibu" => "required|max:36",
            "nama_lengkap" => "required|max:36",
            "tempat_lahir" => "required|max:36",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "status" => "required",
            "agama" => "required",
            "tinggi_badan" => "nullable|numeric|min:10",
            "berat_badan" => "nullable|numeric|min:10",
            "jln" => "nullable",
            "rtrw" => "nullable",
            "kel" => "required",
            "kec" => "required",
            "kab" => "required",
            "provinsi" => "required",
            "pos" => "nullable|numeric",
            "telp" => "required|numeric|digits_between:10,12",
            "email" => "nullable|email",
            "pendidikan" => "required",
            "jurusan" => "nullable",
            "keterampilan" => "nullable",
            "tahun_lulus" => "required",
            "sd_tahun" => "nullable",
            "smp_tahun" => "nullable",
            "sma_tahun" => "nullable",
            "jabatan_1" => "nullable",
            "uraian_tugas_1" => "nullable",
            "lama_kerja_1" => "nullable",
            "pemberi_kerja_1" => "nullable",
            "jabatan_2" => "nullable",
            "uraian_tugas_2" => "nullable",
            "lama_kerja_2" => "nullable",
            "pemberi_kerja_2" => "nullable",
            "jabatan_dalam_negeri" => "nullable",
            "jabatan_luar_negeri" => "nullable",
            "lama_lulus_pendidikan" => "required",
            "upah_yang_diinginkan" => "required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $data = $request->all();
            if ($request->has('bahasa_asing')) {
                $data['bahasa_asing'] = implode(',', $request->bahasa_asing);
            }

            Surat::create($data);

            return redirect()
                ->route('surat.index')
                ->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['message' => ['Terjadi kesalahan!', $th->getMessage()]]);
        }
    }

    public function show($uuid)
    {
        $surat = Surat::where('uuid', $uuid)->first();

        return view('pages.surat.show', compact('surat'));
    }

    public function edit($uuid)
    {
        $surat = Surat::where('uuid', $uuid)->first();

        return view('pages.surat.edit', compact('surat'));
    }

    public function update(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), [
            "tanggal_pendaftaran" => "required|date",
            "no_pendaftar" => "required|numeric|digits:16",
            "nik" => "required|numeric|digits:16",
            "nama_pengantar_kerja" => "required|max:36",
            "nama_ibu" => "required|max:36",
            "nama_lengkap" => "required|max:36",
            "tempat_lahir" => "required|max:36",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "status" => "required",
            "agama" => "required",
            "tinggi_badan" => "nullable|numeric|min:10",
            "berat_badan" => "nullable|numeric|min:10",
            "jln" => "nullable",
            "rtrw" => "nullable",
            "kel" => "required",
            "kec" => "required",
            "kab" => "required",
            "provinsi" => "required",
            "pos" => "nullable|numeric",
            "telp" => "required|numeric|digits_between:10,12",
            "email" => "nullable|email",
            "pendidikan" => "required",
            "jurusan" => "nullable",
            "keterampilan" => "nullable",
            "tahun_lulus" => "required",
            "sd_tahun" => "nullable",
            "smp_tahun" => "nullable",
            "sma_tahun" => "nullable",
            "jabatan_1" => "nullable",
            "uraian_tugas_1" => "nullable",
            "lama_kerja_1" => "nullable",
            "pemberi_kerja_1" => "nullable",
            "jabatan_2" => "nullable",
            "uraian_tugas_2" => "nullable",
            "lama_kerja_2" => "nullable",
            "pemberi_kerja_2" => "nullable",
            "lama_lulus_pendidikan" => "required",
            "jabatan_dalam_negeri" => "nullable",
            "jabatan_luar_negeri" => "nullable",
            "lowongan" => "nullable",
            "upah_yang_diinginkan" => "required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $data = $request->all(["tanggal_pendaftaran", "no_pendaftar", "nik", "nama_pengantar_kerja", "nama_ibu", "nama_lengkap", "tempat_lahir", "tanggal_lahir", "jenis_kelamin", "status", "agama", "tinggi_badan", "berat_badan", "jln", "rtrw", "kel", "kec", "kab", "provinsi", "pos", "telp", "email", "pendidikan", "jurusan", "keterampilan", "tahun_lulus", "sd_tahun", "smp_tahun", "sma_tahun", "jabatan_1", "uraian_tugas_1", "lama_kerja_1", "pemberi_kerja_1", "jabatan_2", "uraian_tugas_2", "lama_kerja_2", "pemberi_kerja_2", "lama_lulus_pendidikan", "jabatan_dalam_negeri", "jabatan_luar_negeri", "lowongan", "upah_yang_diinginkan",]);
            if ($request->has('bahasa_asing')) {
                $data['bahasa_asing'] = implode(',', $request->bahasa_asing);
            }

            Surat::where('uuid', $uuid)->update($data);

            return redirect()
                ->back()
                ->with('success', 'Data berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['message' => ['Terjadi kesalahan!', $th->getMessage()]]);
        }
    }

    public function destroy($uuid)
    {
        try {
            Surat::where('uuid', $uuid)->delete();

            return redirect()
                ->route('surat.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['message' => ['Terjadi kesalahan!', $th->getMessage()]]);
        }
    }
}
