<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends BaseAPIController
{
    public function category()
    {
        $categories = Category::where('parent_id', null)->with('subCategories')->get();
        return $this->responseSuccess($categories, 'Get category success');
    }
}
