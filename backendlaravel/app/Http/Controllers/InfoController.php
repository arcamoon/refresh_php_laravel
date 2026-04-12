<?php

namespace App\Http\Controllers;

use App\Business\Services\HiService;
use App\Business\Services\ProductService;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function __construct(protected ProductService $productService)
    {
        //
    }

    public function message(HiService $hiService)
    {
        return response()->json($hiService->hi());
    }
}
