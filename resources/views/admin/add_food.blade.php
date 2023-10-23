@extends('admin.layouts.templates')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Food</h4>
                @if (!empty($message))
                    <div class="alert alert-success">

                        {{ $message }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close"
                            style="float:right;">x</button>
                    </div>
                @endif

                <form action="{{ route('storefood') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name"class="form-control" id="exampleInputName1"
                            placeholder="Food Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Short Description</label>
                        <input type="text" name="short_desc"class="form-control" id="exampleInputEmail3"
                            placeholder="Short Description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="text" name="price"class="form-control" id="exampleInputPassword4"
                            placeholder="Price">
                    </div>

                    <div class="form-group">
                        <label>Food Image</label>
                        <input type="file" name="image" class="form-control file-upload-info"
                            placeholder="Upload Image">

                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
