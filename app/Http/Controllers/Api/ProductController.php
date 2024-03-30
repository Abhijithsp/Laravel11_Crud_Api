<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Backend\Product;
use Validator;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;


class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'Products details fetched successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
       $product->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
