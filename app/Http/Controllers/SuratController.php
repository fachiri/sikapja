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
            "tinggi_badan" => "required|numeric|min:10",
            "berat_badan" => "required|numeric|min:10",
            "jln" => "required",
            "rtrw" => "required",
            "kel" => "required",
            "kec" => "required",
            "kab" => "required",
            "provinsi" => "required",
            "pos" => "required|numeric",
            "telp" => "required|numeric|digits_between:10,12",
            "email" => "required|email",
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

    public function show(Surat $surat)
    {
        //
    }

    public function edit(Surat $surat)
    {
        //
    }

    public function update(UpdateSuratRequest $request, Surat $surat)
    {
        //
    }

    public function destroy(Surat $surat)
    {
        //
    }
}
