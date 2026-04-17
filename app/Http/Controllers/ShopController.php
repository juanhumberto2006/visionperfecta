<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display the shop homepage with featured products.
     */
    public function index()
    {
        $productos = Producto::where('estado', 1)->take(8)->get();
        $categorias = Categoria::all();
        return view('shop.index', compact('productos', 'categorias'));
    }

    /**
     * Display all products in the catalog.
     */
    public function catalog()
    {
        $productos = Producto::where('estado', 1)->paginate(12);
        $categorias = Categoria::all();
        return view('shop.catalog', compact('productos', 'categorias'));
    }

    /**
     * Display products by category.
     */
    public function category($id)
    {
        $categoria = Categoria::findOrFail($id);
        $productos = Producto::where('categoria_id', $id)
                            ->where('estado', 1)
                            ->paginate(12);
        $categorias = Categoria::all();
        return view('shop.category', compact('productos', 'categorias', 'categoria'));
    }

    /**
     * Display product details.
     */
    public function product($id)
    {
        $producto = Producto::findOrFail($id);
        $relacionados = Producto::where('categoria_id', $producto->categoria_id)
                                ->where('id', '!=', $id)
                                ->where('estado', 1)
                                ->take(4)
                                ->get();
        return view('shop.product', compact('producto', 'relacionados'));
    }

    /**
     * Search products.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $productos = Producto::where('nombre', 'like', "%$query%")
                            ->orWhere('descripcion', 'like', "%$query%")
                            ->where('estado', 1)
                            ->paginate(12);
        $categorias = Categoria::all();
        return view('shop.search', compact('productos', 'categorias', 'query'));
    }
}