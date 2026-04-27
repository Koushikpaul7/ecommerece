@extends('admin.layouts.app')
@section('index', 'All Users')
@section('content')
<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create User</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    {{-- @if($user->id == Auth::id())
                    @continue
                    @endif --}}
                    {{-- 2. Only show if the role is 'admin' or 'superadmin' --}}
                    @if($user->role == 'admin' || $user->role == 'superadmin')
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection