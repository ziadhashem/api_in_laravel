<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2/26/2024
 * Time: 6:04 AM
 */

namespace App\Repositories;

use App\Models\product;
use App\Models\product_price;
use Illuminate\Support\Facades\Auth;


class ProductRepository
{
    protected $model;

    public function __construct(product $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // get current user
        $userId = Auth::id();
        // get products and prices of them according to type current user.
        $products = product_price::with(['product'])->whereRelation('product', 'is_active', '=', 1)
            ->where('user_id',$userId)->get();
        return  $products;
    }

    public function getById(int $productId)
    {

        return product::query()->findOrFail($productId);
    }

    public function create(array $details)
    {
        $product = product::create($details);
        return $product;
    }

    public function update(int $productId, array $details)
    {
        return product::query()->where('id', $productId)->update($details);
    }

    public function delete(int $productId)
    {
        return product::query()->where('id', $productId)->delete();
    }

}