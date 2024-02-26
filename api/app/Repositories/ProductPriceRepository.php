<?php
/**
 * Created by PhpStorm.
 * ProductPrice: Dell
 * Date: 2/26/2024
 * Time: 6:04 AM
 */

namespace App\Repositories;

use App\Models\product_price;


class ProductPriceRepository
{
    protected $model;

    public function __construct(product_price $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $productPrices = product_price::all();
        return  $productPrices;
    }

    public function getById(int $productPriceId)
    {

        return product_price::query()->findOrFail($productPriceId);
    }

    public function create(array $details)
    {
        $productPrice = product_price::create($details);
        return $productPrice;
    }

    public function update(int $productPriceId, array $details)
    {
        return product_price::query()->where('id', $productPriceId)->update($details);
    }

    public function delete(int $productPriceId)
    {
        return product_price::query()->where('id', $productPriceId)->delete();
    }

}