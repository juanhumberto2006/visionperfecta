<?php

namespace App\Services;

use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

class FacturaPDFService
{
    /**
     * Genera una factura en PDF para una compra
     *
     * @param Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function generarFactura(Compra $compra)
    {
        $data = [
            'compra' => $compra,
            'detalles' => $compra->detalles,
            'fecha' => $compra->fecha ?? $compra->created_at->format('Y-m-d'),
            'subtotal' => $compra->total,
            'iva' => $compra->total * 0.16,
            'total' => $compra->total * 1.16,
        ];

        $pdf = PDF::loadView('pdf.factura', $data);
        return $pdf->download('factura-' . $compra->referencia . '.pdf');
    }

    /**
     * Genera una factura en PDF y la devuelve como string
     *
     * @param Compra $compra
     * @return string
     */
    public function generarFacturaString(Compra $compra)
    {
        $data = [
            'compra' => $compra,
            'detalles' => $compra->detalles,
            'fecha' => $compra->fecha ?? $compra->created_at->format('Y-m-d'),
            'subtotal' => $compra->total,
            'iva' => $compra->total * 0.16,
            'total' => $compra->total * 1.16,
        ];

        $pdf = PDF::loadView('pdf.factura', $data);
        return $pdf->output();
    }
}