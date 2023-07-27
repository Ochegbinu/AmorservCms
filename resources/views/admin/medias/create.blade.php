@extends('layouts.app')

@section('body_contents')

<div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Media Management</h3>
            </div>
            <div class="card-body">
               <div class="card-body">
                <form action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="filename" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="filename" name="filename">
                    </div>
                    <div class="mb-3">
                        <label for="mime_type" class="form-label">MIME Type</label>
                        <select class="form-control" id="mime_type" name="mime_type">
                        <option value="">Select type</option>
                        <option value="Video">Video</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="dropify" name="Video">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Add Media</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  

<script>
$(document).ready(function() {
$('.dropify').dropify();
});
</script>
@endsection