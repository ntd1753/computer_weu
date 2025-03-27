<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends BaseAPIController
{
    private function getProductsByParentCategory($parentCategoryId)
    {
        $parentCategory = Category::find($parentCategoryId);

        if (!$parentCategory) {
            return [];
        }

        $childCategoryIds = Category::where('parent_id', $parentCategoryId)->pluck('id')->toArray();
        $allCategoryIds = array_merge([$parentCategoryId], $childCategoryIds);

        $products = Product::whereIn('category_id', $allCategoryIds)->orderBy('id', "DESC")->take(10)->get();

        return $products;
    }

    public function category()
    {
        $categories = Category::where('parent_id', null)->with('subCategories')->get();
        return $this->responseSuccess($categories, 'Get category success');
    }

    public function  getListHomeProduct()
    {
        $categories = Category::where('parent_id', null)->get();
        $data = [];
        foreach ($categories as $category) {
            $products = $this->getProductsByParentCategory($category->id);
            $data[] = [
                'category' => $category,
                'products' => $products
            ];
        }
        return $this->responseSuccess($data, 'Get category success');
    }
}
