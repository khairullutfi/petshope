<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function pdf()
    {
        $data['judul'] = "Laporan Pdf";
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }

}