<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\UpdateprodectRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductController extends Controller{

    private $productRepository;
    public function __construct(ProductRepository $productRepository) {
           $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {

        try {
            $products = $this->productRepository->getAll();
            return [
                "status" => 1,
                "data" => $products
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return array
     */
    public function store(Request $request)
    {
        try {
            $product = $this->productRepository->create($request->all());
            return [
                "status" => 1,
                "data" => $product,
                 "msg"=>"Product is saved",
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param product $product
     * @return void
     */
    public function show(product $product)
    {
        try {
            $productId = $product->getAttribute('id');
            $product = $this->productRepository->getById($productId);
            return [
                "status" => 1,
                "data" => $product
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
            ];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param product $product
     * @return void
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param product $product
     * @return array
     */
    public function update(Request $request, product $product)
    {
        try {
            $product = $this->productRepository->update($product->getAttribute('id'),$request->all());
            return [
                "status" => 1,
                "data" => $product,
                "msg" => "product updated successfully"
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param product $product
     * @return array
     */
    public function destroy(product $product)
    {
        try {
            $product = $this->productRepository->delete($product->getAttribute("id"));
            return [
                "status" => 1,
                "data" => $product,
                "msg" => "product deleted successfully"
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }
}
