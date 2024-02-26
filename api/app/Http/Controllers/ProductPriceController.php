<?php

namespace App\Http\Controllers;

use App\Models\product_price;
use App\Http\Requests\Storeprodect_priceRequest;
use App\Http\Requests\Updateprodect_priceRequest;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storeprodect_priceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeprodect_priceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_price  $prodect_price
     * @return \Illuminate\Http\Response
     */
    public function show(product_price $prodect_price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_price  $prodect_price
     * @return \Illuminate\Http\Response
     */
    public function edit(product_price $prodect_price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateprodect_priceRequest  $request
     * @param  \App\Models\product_price  $prodect_price
     * @return \Illuminate\Http\Response
     */
    public function update(Updateprodect_priceRequest $request, product_price $prodect_price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_price  $prodect_price
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_price $prodect_price)
    {
        //
    }
}
