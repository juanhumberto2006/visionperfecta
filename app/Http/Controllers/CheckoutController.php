<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Services\FacturaPDFService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'process', 'complete']);
    }
    
    /**
     * Display the checkout page.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        
        return view('shop.checkout', compact('cart', 'total'));
    }

    /**
     * Process the checkout and redirect to PayPal.
     */
    public function process(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
        
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío');
        }
        
        // Guardar información del cliente en la sesión
        Session::put('checkout_info', [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);
        
        // Calcular total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        
        // Generar orden de compra
        $orden = [
            'id' => Str::random(10),
            'total' => $total,
            'fecha' => now()->format('Y-m-d H:i:s'),
        ];
        
        Session::put('orden', $orden);
        
        // Redireccionar a PayPal (simulación)
        return redirect()->route('checkout.paypal');
    }

    /**
     * Simulate PayPal payment page.
     */
    public function paypal()
    {
        $cart = Session::get('cart', []);
        $orden = Session::get('orden');
        $checkout_info = Session::get('checkout_info');
        
        if (!$cart || !$orden || !$checkout_info) {
            return redirect()->route('shop.index');
        }
        
        return view('shop.paypal', compact('cart', 'orden', 'checkout_info'));
    }

    /**
     * Complete the order after payment.
     */
    public function complete()
    {
        $cart = Session::get('cart', []);
        $orden = Session::get('orden');
        $checkout_info = Session::get('checkout_info');
        
        if (!$cart || !$orden || !$checkout_info) {
            return redirect()->route('shop.index');
        }
        
        // Verificar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión para completar la compra');
        }
        
        // Crear la compra en la base de datos
        $compra = new Compra();
        $compra->user_id = Auth::id();
        $compra->total = $orden['total'];
        $compra->estado = 'completado';
        $compra->referencia = $orden['id'];
        $compra->nombre_cliente = $checkout_info['nombre'];
        $compra->email_cliente = $checkout_info['email'];
        $compra->direccion_cliente = $checkout_info['direccion'];
        $compra->telefono_cliente = $checkout_info['telefono'];
        $compra->save();
        
        // Guardar detalles de la compra
        foreach ($cart as $item) {
            $detalle = new DetalleCompra();
            $detalle->compra_id = $compra->id;
            $detalle->producto_id = $item['id'];
            $detalle->cantidad = $item['cantidad'];
            $detalle->precio_unitario = $item['precio'];
            $detalle->subtotal = $item['precio'] * $item['cantidad'];
            $detalle->save();
        }
        
        // Enviar correo con la factura
        $this->enviarFactura($compra);
        
        // Limpiar sesión
        Session::forget(['cart', 'orden', 'checkout_info']);
        
        return view('shop.complete', compact('compra'));
    }

    /**
     * Generate and send invoice by email.
     */
    private function enviarFactura($compra)
    {
        // Generar la factura en PDF
        $facturaPDFService = new FacturaPDFService();
        $pdfContent = $facturaPDFService->generarFacturaString($compra);
        
        // Aquí se podría implementar el envío por correo electrónico
        // Por ahora, solo guardamos la factura en la sesión para descargarla
        Session::put('factura_pdf', [
            'content' => base64_encode($pdfContent),
            'nombre' => 'factura-' . $compra->referencia . '.pdf'
        ]);
        
        // Mail::to($compra->email_cliente)->send(new FacturaCompra($compra, $pdfContent));
        
        return $pdfContent;
    }
    
    /**
     * Download invoice as PDF.
     */
    public function descargarFactura($referencia)
    {
        $compra = Compra::where('referencia', $referencia)->firstOrFail();
        
        // Verificar que el usuario sea el propietario de la compra
        if (Auth::id() != $compra->user_id) {
            abort(403, 'No tienes permiso para acceder a esta factura');
        }
        
        $facturaPDFService = new FacturaPDFService();
        return $facturaPDFService->generarFactura($compra);
    }
}