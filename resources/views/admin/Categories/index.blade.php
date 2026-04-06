@extends('admin.layouts.app')
@section('index', 'Category List')
@section('content')
<div class="container-fluid">
    <div class="card mt-4">
       <div class="border-bottom pb-4 d-flex justify-content-between align-items-center pe-4">
         <h5 class="card-header">List of Categories</h5>
        <h3><a class="btn btn-success btn-sm" href="{{route('admin.categories.create')}}">Add New Category</a></h3>
       </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->name ?? ''
                                }}</strong></td>
                        
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
    </div>

    @endsection