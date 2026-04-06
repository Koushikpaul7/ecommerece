@extends('admin.layouts.app')
@section('index', 'Edit Banner')
@section('content')
<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Banner Title" value="{{ $banner->title ?? '' }}">
                </div>
                <div class="input-group">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02" />
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                    <div class="mt-3">
                        <img src="{{ asset($banner->image ?? '') }}" alt="{{ $banner->title ?? '' }}" class="img-fluid" width="200">
                    </div>
                <button type="submit" class="btn btn-primary mt-3">Update Banner</button>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection