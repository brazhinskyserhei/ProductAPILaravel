<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Responses\ProductsResponse;
use App\Product;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        $productsCollection = $products->getCollection();

        return fractal()
            ->collection($productsCollection)
            ->parseIncludes(['user', 'categories'])
            ->transformWith(new ProductsResponse())
            ->paginateWith(new IlluminatePaginatorAdapter($products))
            ->toArray();
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->description = $request->description;
        $product->count = $request->count;
        $product->vendor_code = $request->vendor_code;
        $product->status = $request->status;
        $product->discount = $request->discount;
        $product->user()->associate($request->user());
        $product->image = null;
        $product->save();

        $product->saveImage($request->file('image'));

        $categories = explode(",", $request->categories);
        $product->categories()->sync($categories);

        return fractal()
            ->item($product)
            ->parseIncludes(['user', 'categories'])
            ->transformWith(new ProductsResponse())
            ->toArray();
    }

    public function update(StoreProductRequest $request,Product $product)
    {
        $product->title = $request->get('title', $product->title);
        $product->price = $request->get('price', $product->price);
        $product->old_price = $request->get('old_price', $product->old_price);
        $product->description = $request->get('description', $product->description);
        $product->count = $request->get('count', $product->count);
        $product->vendor_code = $request->get('vendor_code', $product->vendor_code);
        $product->status = $request->get('status', $product->status);
        $product->discount = $request->get('discount', $product->discount);
        $product->save();

        $product->uploadImage($request->file('image'));

        $categories = explode(",", $request->categories);
        $product->categories()->sync($categories);

        return fractal()
            ->item($product)
            ->parseIncludes(['user', 'categories'])
            ->transformWith(new ProductsResponse())
            ->toArray();


    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response('Product was deleted', 204);
    }
}
