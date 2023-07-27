@extends('layouts.app')

@section('body_contents')
<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Category Management</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{route('create.show')}}" class="btn btn-success">Create New Category</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Meta Title</th>
                            <th>Meta Description</th>
                            <th>Meta Keywords</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->meta_title }}</td>
                                <td>{!! $category->meta_description !!}</td>
                                <td>{{ $category->meta_keywords }}</td>
                                <td>
                                <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $category->id }}">
                                    <i class="fa fa-pencil"></i>
                                    </button>                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@foreach ($categories as $key => $category )
    
<!-- Modal -->
<div class="modal fade" id="staticBackdrop-{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" value="{{$category->meta_title}}" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" value="{{$category->meta_description}}" id="editor" name="meta_description" rows="3" placeholder="Enter meta description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" value="{{$category->meta_keywords}}" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords">
                    </div>
                    <div class="form-group text-center mt-2"> <!-- Add the text-center class here -->
                        <button type="submit" class="btn btn-dark">Update Category</button>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection