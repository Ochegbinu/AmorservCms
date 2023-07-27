<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index(){
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    public function show(){
        return view('admin.tags.create');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);

        // Create the tag
        $tag = new Tag();
        $tag->name = $request->input('name');
        // Add other tag fields based on your database schema

        // Save the tag to the database
        $tag->save();

        return redirect()->route('tags.show')->with('success', 'Tag created successfully!');
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'string|max:255',
        ]);

        // Find the tag by ID
        $tag = Tag::findOrFail($id);

        $tag->update([
            'name' => $request->name,
        ]);
        
        return redirect()->route('tags.show')->with('success', 'Tag updated successfully!');
    }

    
    public function destroy($id)
    {
        // Find the tag by ID
        $tag = Tag::findOrFail($id);

        // Delete the tag
        $tag->delete();

        return redirect()->route('tags.show')->with('success', 'Tag deleted successfully!');
    }
}
