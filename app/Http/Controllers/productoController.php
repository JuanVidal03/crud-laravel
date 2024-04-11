<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar modelo
use App\Models\Producto;

class productoController extends Controller
{
    // todos los productos
    public function index(){
        $productos = Producto::all();
        return $productos;
    }

    // obtener producto por id
    public function show(int $id){
        $product = Producto::find($id);
        return response()->json($product, 200);
    }

    // agregar producto
    public function store(Request $request){

        $data = $request->all();
        $producto = new Producto($data);
        $producto->save();

        return response()->json($producto, 200);

    }

    // actualizar producto
    public function update(Request $request, int $id){

        $data = $request->all();
        $productoActualizado = Producto::findOrFail($id);
        $productoActualizado->fill($data);
        $productoActualizado->save();

        return response()->json($productoActualizado);
    }

    // eliminar producto
    public function destroy(int $id){

        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response([], 204);

    }

}