<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use Illuminate\Http\Request;

class ContentController extends Controller
{


    public function index()
    {
        $contents = Content::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.contents.index', compact('contents', 'categories', 'tags'));
    }

    public function show()
    {
        $categories = Category::all();
        $contents = Content::all();
        $tags = Tag::all();
        return view('admin.contents.create', compact('categories', 'contents', 'tags'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            // 'title' => 'required|string|max:255',
            // 'body' => 'required|string',
            // 'category_id' => 'required|exists:categories,id',
            // 'meta_description' => 'string|max:255',
            // 'meta_keywords' => 'string|max:255',
            // 'meta_title' => 'string|max:255',
            // 'tag_id' => 'required|exists:tags,id',
            // 'attachment' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);
    
        // Create the content
        $content = new Content();
        $content->title = $request->input('title');
        $content->body = $request->input('body');
        $content->category_id = $request->input('category_id');
        $content->tag_id = $request->input('tag_id');
        $content->meta_description = $request->input('meta_description');
        $content->meta_title = $request->input('meta_title');
        $content->meta_keywords = $request->input('meta_keywords');
    
        // Handle file upload if the 'attachment' field is present and valid
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $content->attachment = $filePath;
        }
    
        // Save the content to the database
        $content->save();
    
        if ($content->save()) {
            return redirect()->route('contents.index')->with('success', 'Content created successfully!');
        } else {
            return redirect()->route('contents.index')->with('error', 'Content can\'t be created successfully!');
        }
    }
    


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
          
        ]);

        // Find the content by ID
        $content = Content::findOrFail($id);


        $content->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords

        ]);
     
        return redirect()->route('contents.index')->with('success', 'Content updated successfully!');
    }

    public function destroy($id)
    {
        // Find the content by ID
        $content = Content::findOrFail($id);

        // Delete the content
        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Content deleted successfully!');
    }
}