<?php

namespace App\Http\Controllers;

use App\Models\product_price;
use App\Http\Requests\Storeprodect_priceRequest;
use App\Http\Requests\Updateprodect_priceRequest;
use App\Repositories\ProductPriceRepository;
use http\Exception;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    private $productPriceRepository;
    public function __construct(ProductPriceRepository $repository) {
        $this->productPriceRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {

        try {
            $productPrices = $this->productPriceRepository->getAll();
            return [
                "status" => 1,
                "data" => $productPrices
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
       //
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
            $productPrice = $this->productPriceRepository->create($request->all());
            return [
                "status" => 1,
                "data" => $productPrice,
                "msg"=>"Product Price is saved",
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
     * @param product_Price $productPrice
     * @return void
     */
    public function show(product_Price $productPrice)
    {
        try {
            $productPriceId = $productPrice->getAttribute('id');
            $productPrice = $this->productPriceRepository->getById($productPriceId);
            return [
                "status" => 1,
                "data" => $productPrice
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
     * @param product_price $productPrice
     * @return void
     */
    public function edit(product_Price $productPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param product_Price $productPrice
     * @return array
     */
    public function update(Request $request, product_price $productPrice)
    {
        try {
            $productPrice = $this->productPriceRepository->update($productPrice->getAttribute('id'),$request->all());
            return [
                "status" => 1,
                "data" => $productPrice,
                "msg" => "productPrice updated successfully"
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
     * @param product_Price $productPrice
     * @return array
     */
    public function destroy(product_Price $productPrice)
    {
        try {
            $productPrice = $this->productPriceRepository->delete($productPrice->getAttribute("id"));
            return [
                "status" => 1,
                "data" => $productPrice,
                "msg" => "productPrice deleted successfully"
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
