<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query("per_page", 10);
        $page = $request->query("page", 0);
        $offset = $page * $perPage;

        $products = Product::skip($offset)->take($perPage)->get();

        return response()->json([ $products]);
    }

    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|max:2000',
                'price' => 'required|numeric',
                'category_id' => 'required|exists:category,id',
            ], [
                "name.required" => 'el nombre del producto es obligatorio',
                "name.string" => 'El nombre debe ser una cadena de texto',
            ]);

            $product = Product::create($validateData);
            return response()->json($product);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $validateDate = $request->validated();
            $product->update($validateDate);
        } catch (Exception $e) {
            return response()->json(['error' => $e], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json(['message' => 'Producto actualizado exitosamente', 'product' => $product]);
    }

    public function destroy(int $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(['message' => 'Producto eliminado'], Response::HTTP_ACCEPTED);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Producto no encontrado'], Response::HTTP_NOT_FOUND);
        }
    }
}
