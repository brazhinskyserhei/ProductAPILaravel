<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Responses\CategoriesResponse;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        $categoriesCollection = $categories->getCollection();

        return fractal()
            ->collection($categoriesCollection)
            ->parseIncludes(['user'])
            ->transformWith(new CategoriesResponse())
            ->paginateWith(new IlluminatePaginatorAdapter($categories))
            ->toArray();
    }

    public function show($id)
    {
        $category = Category::find($id);
        if ($category) {
            return fractal()
                ->item($category)
                ->parseIncludes(['user', 'products', 'products.user'])
                ->transformWith(new CategoriesResponse())
                ->toArray();
        }
        else{
            return response()->json(['errors' => 'This category does not exist'], 404);
        }


    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->user()->associate($request->user());
        $category->save();

        return fractal()
            ->item($category)
            ->parseIncludes(['user'])
            ->transformWith(new CategoriesResponse)
            ->toArray();
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->name = $request->get('name', $request->name);
            $category->description = $request->get('description', $request->description);
            $category->save();
            return fractal()
                ->item($category)
                ->parseIncludes(['user'])
                ->transformWith(new CategoriesResponse)
                ->toArray();
        } else {
            return response()->json(['errors' => 'This category does not exist'], 404);
        }

    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if( $category){
            $category->delete();
            return response()->json(['susses' => 'This category deleted'], 204);
        }
        else{
            return response()->json(['errors' => 'This category does not exist'], 404);
        }



    }

}
