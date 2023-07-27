@extends('layouts.app')

@section('body_contents')
<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">User Management</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="" class="btn btn-success">Create New User</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-primary btn-sm me-2"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
@endsection