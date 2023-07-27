@extends('layouts.app')

@section('body_contents')

<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Category Management</h3>
            </div>
               
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="editor" name="meta_description" rows="3" placeholder="Enter meta description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords">
                    </div>
                    <div class="form-group text-center mt-2"> <!-- Add the text-center class here -->
                        <button type="submit" class="btn btn-dark">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@endsection