<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_sucursales = Sucursal::count();
        $total_categorias = Categoria::count();
        return view('admin.index', compact('total_sucursales', 'total_categorias'));
    }
}
