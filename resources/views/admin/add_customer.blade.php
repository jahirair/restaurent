@extends('admin.layouts.templates')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Customer</h4>
                <span id="message" style="float:right;margin-top:-30px;"></span>

                <form action="javascript:void(0)" method="post" id="customer_add"enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name"class="form-control" id="exampleInputName1" placeholder="Chef Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Address</label>
                        <input type="text" name="address"class="form-control" id="exampleInputEmail3"
                            placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mobile</label>
                        <input type="text" name="mobile"class="form-control" id="exampleInputPassword4"
                            placeholder="Mobile Number" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset"class="btn btn-dark">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
