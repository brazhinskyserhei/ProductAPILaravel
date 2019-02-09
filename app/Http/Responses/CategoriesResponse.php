<?php

namespace App\Http\Responses;

use App\Category;

class CategoriesResponse extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user','products'];

    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'created_at' => $category->created_at->toDateTimeString(),
        ];
    }

    public function includeUser(Category $category)
    {
        return $this->item($category->user, new UsersResponse);
    }

    public function includeProducts(Category $category)
    {
        return $this->collection($category->products, new ProductsResponse);
    }



}