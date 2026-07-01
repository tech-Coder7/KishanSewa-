<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::with('parent')->get();
        
        return view("admin.categories.index" , compact("categories"));

    }
    public function create()
    {
        $parentCategories = Category::where("parent_id", null)->get();
        //    dump($parentCategories);


        return view("admin.categories.create", compact("parentCategories"));

    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255|unique:categories,name',
        //     'parent_id' => 'nullable|exists:categories,id',
        //     'status' => 'required|in:active,inactive,pending',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
        ]);

        return redirect('/admin/categories')
            ->with('success', 'Category created successfully!');
    }
}
