<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $surat = Surat::all();
        $pengguna = User::all();

        $currentYear = now()->year;

        $suratPerBulan = [];
        for ($month = 1; $month <= 12; $month++) {
            $count = $surat
                ->filter(function ($item) use ($currentYear, $month) {
                    return $item->created_at->year == $currentYear && $item->created_at->month == $month;
                })
                ->count();

            $suratPerBulan[] = $count;
        }

        $data = (object) [
            'dataBerdasarkanJenisKelamin' =>  [
                $surat->where('jenis_kelamin', 'LAKI-LAKI')->count(),
                $surat->where('jenis_kelamin', 'PEREMPUAN')->count()
            ],
            'jumlahPencariKerja' => $surat->count(),
            'jumlahPengguna' => $pengguna->count(),
            'suratPerBulan' => $suratPerBulan,
            'tahunSekarang' => $currentYear
        ];

        return view('pages.dashboard.index', compact('data'));
    }
}
