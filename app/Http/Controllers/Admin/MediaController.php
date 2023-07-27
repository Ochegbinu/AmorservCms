<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Storage;
use Validator;

class MediaController extends Controller
{
    public function index()
    {
        $mediaItems = Media::all();
        return view('admin.medias.create', compact('mediaItems'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([

        ]);

        $videoPath = $request->file('Video')->store('videos', 'public');

        $video = Media::create([
            'filename' => $request->filename,
            'mime_type' => $request->mime_type,
            'type' => $videoPath,
        ]);

        // Save the video details to the database
        $video->save();
        if ($video) {
            return redirect()->back()->with('success', 'Video uploaded successfully.');

        } else {
            return redirect()->back()->with('error', 'Video cant be uploaded successfully.');

        }
    }


    public function edit(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    public function update(Request $request, Media $media)
    {
        $validator = Validator::make($request->all(), [
            'filename' => 'required|string',
            'mime_type' => 'required|string',
            'type' => 'required|in:video,image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $media->update($request->all());

        return redirect()->route('media.index')->with('success', 'Media item updated successfully.');
    }

    public function destroy(Media $media)
    {
        Storage::delete($media->filename);
        $media->delete();

        return redirect()->route('media.index')->with('success', 'Media item deleted successfully.');
    }
}