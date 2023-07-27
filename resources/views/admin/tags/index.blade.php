@extends('layouts.app')

@section('body_contents')
<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tag Management</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{route('tags')}}" class="btn btn-success">Create New Tag</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                <div class="d-flex">
                                   
                                    <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $tag->id }}">
                                    <i class="fa fa-pencil"></i>
                                    </button>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tag?');">
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






    @foreach ($tags as $tag)

<!-- Modal -->
<div class="modal fade" id="staticBackdrop-{{ $tag->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Tag</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('tags.update', ['id' => $tag->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tag_name" class="form-label">Tag Name</label>
            <input type="text" value="{{ $tag->name }}" class="form-control" name="name">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark">Update Tag</button>
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