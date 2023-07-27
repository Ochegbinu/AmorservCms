@extends('layouts.app')

@section('body_contents')
<div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Content Management</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{route('contents.show')}}" class="btn btn-success">Create New Content</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->category->name }}</td>
                                <td>{!! $content->body !!}</td>
                                <td>
                                <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $content->id }}">
                                    <i class="fa fa-pencil"></i>
                                    </button>
                                    <form action="{{ route('contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Content?');">
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


@foreach ($contents as $key => $content )
    
<!-- Modal -->
<div class="modal fade" id="staticBackdrop-{{ $content->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Content</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('contents.update', ['id' => $content->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-1">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{$content->title}}" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-1">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" value="{{$content->body}}" id="editor" name="body"></textarea>
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
                                <option value="{{ $category->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" value="{{$content->meta_title}}" id="meta_title" name="meta_title">
                    </div>
                    <div class="mb-1">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="editorm" name="meta_description" rows="4"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                        <input type="text" class="form-control" value="{{$content->meta_keyword}}"  id="meta_keyword" name="meta_keyword">
                    </div>
                    <div class="mb-1">
                        <label for="attachement" class="form-label">Photo</label>
                        <input type="file" class="dropify" name="attachement" value="{{$content->attachement}}" >
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Update Content</button>
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