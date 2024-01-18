<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PdfAlias;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function getPdf(Request $request)
    {
        $data = [
            'title' => 'Welcome my page',
            'date' => date('m/M/Y')
        ];


        $pdf = PdfAlias::loadview('mypdf', $data);

        return $pdf->download('my_pdf.pdf');
    }
}
