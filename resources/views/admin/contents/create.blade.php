@extends('layouts.app')
@section('body_contents')
<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Content Management</h3>
            </div>
        
            <div class="card-body">
                <form action="{{ route('contents.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-1">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="editor" name="body"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="tag_id" class="form-label">Tag</label>
                        <select class="form-select" id="tag_id" name="tag_id">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title">
                    </div>
                    <div class="mb-1">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="editorm" name="meta_description" rows="4"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword">
                    </div>
                    <div class="mb-1">
                        <label for="attachement" class="form-label">Photo</label>
                        <input type="file" class="dropify" name="attachment">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Add Content</button>
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
<script>
ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
        <script>
ClassicEditor
        .create( document.querySelector( '#editorm' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>

@endsection