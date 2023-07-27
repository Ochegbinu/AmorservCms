<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function show()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Create the category
        $category = new Category();
        $category->name = $request->input('name');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        if ($category) {
            return redirect()->route('create.category')->with('success', 'Category created successfully!');

        } else {
            return redirect()->back()->with('error', 'Try again');

        }
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'meta_title' => $request->meta_title,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

        ]);
       
        return redirect()->route('create.category')->with('success', 'Category Updated successfully!');
    }



    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        return redirect()->route('create.category')->with('success', 'Category deleted successfully!');
    }
}