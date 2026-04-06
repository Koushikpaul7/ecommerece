@extends('admin.layouts.app')
@section('index', 'Create Banner')
@section('content')

<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Banner Title">
                </div>
                <div class="input-group">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02" />
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create Banner</button>
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