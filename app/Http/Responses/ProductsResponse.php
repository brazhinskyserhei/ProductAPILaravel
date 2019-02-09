<?php

namespace App\Http\Responses;

use App\Product;

class ProductsResponse extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user','categories'];

    public function transform(Product $product)
    {
        return [
            'title' => $product->title,
            'price' => $product->price,
            'old_price' => $product->old_price,
            'description' => $product->description,
            'count' => $product->count,
            'vendor_code' => $product->vendor_code,
            'status' => $product->status,
            'rating' => $product->rating,
            'is_featured' => $product->is_featured,
            'is_new' => $product->is_new,
            'discount' => $product->discount,
            'views' => $product->views,
            'image' => $product->image,
            'created_at'=> $product->created_at->toDateTimeString(),
        ];
    }

    public function includeUser(Product $product)
    {
        return $this->item($product->user, new UsersResponse);
    }

    public function includeCategories(Product $product)
    {
        return $this->collection($product->categories, new CategoriesResponse);
    }

}