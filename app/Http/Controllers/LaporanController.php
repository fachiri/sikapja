<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function kartu_preview($uuid)
    {
        $surat = Surat::where('uuid', $uuid)->first();
        $pdf = Pdf::loadView('export.kartu', compact('surat'));

        return $pdf->stream();
    }
}
