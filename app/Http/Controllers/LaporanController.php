<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function kartu_preview($uuid)
    {
        $surat = Surat::where('uuid', $uuid)->first();
        $pdf = Pdf::loadView('export.kartu', compact('surat'));

        return $pdf->stream();
    }

    public function laporan_preview(Request $request)
    {
        $surat = Surat::whereYear('created_at', $request->year)
            ->whereMonth('created_at', $request->month)
            ->get();

        foreach ($surat as $s) {
            $tanggal_lahir = Carbon::parse($s->tanggal_lahir);
            $umur = $tanggal_lahir->diffInYears(Carbon::now());

            $s->umur = $umur;
        }

        $pdf = Pdf::loadView('export.laporan', compact('surat'));

        return $pdf->stream();
    }
}
