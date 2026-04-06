@extends('admin.layouts.app')
@section('index', 'Banner List')
@section('content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Hoverable rows</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($banners as $banner)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $banner->title ?? ''
                                }}</strong></td>
                        <td width="20%"><img src="{{ asset($banner->image ?? '') }}" alt="{{ $banner->title ?? '' }}"
                                class="img-fluid"></td>
                        <td>
                            <form action="{{ route('admin.banners.toggleStatus', $banner->id) }}" method="POST" id="status-form-{{ $banner->id }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="switch-{{ $banner->id }}" {{ $banner->status ? 'checked' : '' }}
                                        onchange="document.getElementById('status-form-{{ $banner->id }}').submit();" />
                                    <label class="form-check-label" for="switch-{{ $banner->id }}">
                                        {{ $banner->status ? 'Active' : 'Inactive' }}
                                    </label>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="d-flex justify-content-center">
                {{ $banners->links() }}
            </div>
    </div>

    @endsection