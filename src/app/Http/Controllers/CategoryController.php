<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = $request->only(['content', 'created_at', 'updated_at']);
        Category::create($category);

        return redirect('/admin/categories')->with('message', 'カテゴリを作成しました');
    }
}
