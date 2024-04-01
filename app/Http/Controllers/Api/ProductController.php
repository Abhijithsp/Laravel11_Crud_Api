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
    public function index() : JsonResponse
    {
         $products = Product::all();
         if($products->isEmpty()){
            return $this->sendResponse([], 'Products details not available');
         }else{
            return $this->sendResponse('Products details fetched successfully.',ProductResource::collection($products));
         }

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
    public function store(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

         if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
         $product = Product::create($request->all());

        return $this->sendResponse('Product details created successfully.',new ProductResource($product));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
       $product = Product::find($id);

         if (is_null($product)) {
            return $this->sendError('Product details not found.');
        }else{
            return $this->sendResponse('Product retrieved successfully.',new ProductResource($product));
        }
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
    public function update(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product->update($request->all());

        return $this->sendResponse( 'Product updated successfully.',new ProductResource($product));
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
