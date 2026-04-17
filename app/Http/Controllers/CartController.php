<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        
        return view('shop.cart', compact('cart', 'total'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        $cart = Session::get('cart', []);
        
        $id = $request->producto_id;
        
        if (isset($cart[$id])) {
            $cart[$id]['cantidad'] += $request->cantidad;
        } else {
            $cart[$id] = [
                'id' => $id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio_venta,
                'cantidad' => $request->cantidad,
                'imagen' => $producto->imagen,
            ];
        }
        
        Session::put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    /**
     * Update the quantity of a product in the cart.
     */
    public function update(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cantidad' => 'required|integer|min:1',
        ]);

        $cart = Session::get('cart', []);
        $id = $request->producto_id;
        
        if (isset($cart[$id])) {
            $cart[$id]['cantidad'] = $request->cantidad;
            Session::put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Clear the entire cart.
     */
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }
}