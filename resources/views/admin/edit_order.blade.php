@extends('admin.layouts.templates')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Order</h4>
                @if (\Session::has('message'))
                    <div class="alert alert-success">

                        {{ \Session::get('message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close"
                            style="float:right;">x</button>
                    </div>
                @endif

                <form action="{{ url('/update-order', $order_info->id) }}" method="post" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" style="color:#fff;"name="name"
                            value="{{ $order_info->name }}"class="form-control" id="exampleInputName1"
                            placeholder="Food Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Short Description</label>
                        <input type="text" style="color:#fff;"name="short_desc"
                            value="{{ $order_info->description }}"class="form-control" id="exampleInputEmail3"
                            placeholder="Short Description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="text" style="color:#fff;" name="price"
                            value="{{ $order_info->price }}"class="form-control" id="exampleInputPassword4"
                            placeholder="Price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Previous Image</label>
                        <img style="height:100px;"src="{{ url('Public/home/assets/images/FoodImages/' . $order_info->image) }}"
                            alt="">
                    </div>

                    <div class="form-group">
                        <label>Food Image</label>
                        <input type="file" style="color:#fff;" name="image" class="form-control file-upload-info"
                            placeholder="Upload Image">

                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
