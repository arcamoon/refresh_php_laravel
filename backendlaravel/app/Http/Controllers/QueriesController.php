<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class QueriesController extends Controller
{
    public function get()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function getById(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Usuario no encontrado.'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($product);
    }

    public function getNames()
    {
        $products = Product::select('name')
            ->orderBy('name', 'asc')
            ->get();
        return response()->json([$products]);
    }

    public function searchName(string $name, float $price)
    {
        $products = Product::where("name", $name)
            ->where("price", ">", $price)
            ->orderBy('name')
            ->select('name', 'description')
            ->get();
        Product::where();

        return response()->json($products);
    }

    public function searchString(string $value)
    {
        $products = Product::where("description", "like", "%{$value}%")
            ->orWhere("name", "like", "%{$value}$")
            ->get();
        return response()->json($products);
    }

    public function advancedSearch(Request $request)
    {
        $products = Product::where(function ($query) use ($request) {
            if ($request->input("name")) {
                $query->where("name", 'like', "%" . $request->input("name") . "%");
            }
        })->orWhere(function ($query) use ($request) {
            if ($request->input("description")) {
                $query->where("description", 'like', "%" . $request->input("description") . "%");
            }
        })
        ->get();
        return response()->json($products);
    }

    public function join()
    {
        $products = Product::join("category", "product.category_id", "=", "category.id")
            ->select("product.*", "category.name as category")
            ->get();

        return response()->json($products);
    }

    public function groupBy()
    {
        $result = Product::join("category", "product.category_id", "=", "category.id")
            ->select("category.id", "category.name", DB::raw("COUNT(product.id) as total"))
            ->groupBy("category.id", "category.name")
            ->get();

        return response()->json($result);
    }
}
