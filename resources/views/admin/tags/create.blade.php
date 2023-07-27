@extends('layouts.app')

@section('body_contents')

<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tag Management</h3>
            </div>
            <div class="card-body">             
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="tag_name" class="form-label">Tag Name</label>
                        <input type="text" class="form-control"  name="name">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Create Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection