<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $idCategoria = $request->input('cats');

        

        if ($idCategoria == "") {
            $productos = Producto::listarProductos();
        } else {
            $productos = Producto::listarProductosByIdCategoria($idCategoria);
        }
        $tipoVenta = 0;
        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias,
            'tipoventa' => $tipoVenta
        ];

        session(['productovista' => 'normal']);

        return view('food.index', $data);
    }


    public function indexEvento(Request $request)
    {
        $idCategoria = $request->input('cats');

        if ($idCategoria == "") {
            $productos = Producto::listarProductos();
        } else {
            $productos = Producto::listarProductosByIdCategoria($idCategoria);
        }
        $tipoVenta = 1;
        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias,
            'tipoventa' => $tipoVenta
        ];
        session(['productovista' => 'normal']);

        return view('food.index', $data);
    }

    
    public function VerCategorias(Request $request)
    {

        $idCategoria = $request->input('cats');

        if ($idCategoria == "") {
            $productos = Producto::listarProductos();
        } else {
            $productos = Producto::listarProductosByIdCategoria($idCategoria);
        }
        $tipoVenta = 0;
        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias,
            'tipoventa' => $tipoVenta
        ];
        session(['productovista' => 'normal']);

        return view('categorias.ver', $data);
    }

    public function VerCategorias2(Request $request)
    {
        
        $idCategoria = $request->input('cats');

        if ($idCategoria == "") {
            $productos = Producto::listarProductos();
        } else {
            $productos = Producto::listarProductosByIdCategoria($idCategoria);
        }
        $tipoVenta = 1;
        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias,
            'tipoventa' => $tipoVenta
        ];
        session(['productovista' => 'normal']);
        return view('categorias.ver', $data);
    }
    
}