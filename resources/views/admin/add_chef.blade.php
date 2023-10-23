@extends('admin.layouts.templates')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Chef</h4>
                @if (\Session::has('message'))
                    <div class="alert alert-success">

                        {{ \Session::get('message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close"
                            style="float:right;">x</button>
                    </div>
                @endif

                <form action="{{ route('storechef') }}" method="post" id="chef_add"enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name"class="form-control" id="exampleInputName1"
                            placeholder="Chef Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <input type="text" name="short_desc"class="form-control" id="exampleInputEmail3"
                            placeholder="Short Description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Expert In</label>
                        <input type="text" name="expert"class="form-control" id="exampleInputPassword4"
                            placeholder="Expert In">
                    </div>

                    <div class="form-group">
                        <label>Chef Image</label>
                        <input type="file" name="image" class="form-control file-upload-info"
                            placeholder="Upload Image">

                    </div>

                    <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="text" name="facebook_link" class="form-control"placeholder="Facebook Link">
                    </div>

                    <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="text" name="twitter_link" class="form-control"placeholder="Twitter Link">
                    </div>
                    <div class="form-group">
                        <label>Instagram Link</label>
                        <input type="text" name="instagram_link" class="form-control"placeholder="Instagram Link">
                    </div>
                    <div class="form-group">
                        <label>Behance Link</label>
                        <input type="text" name="behance_link" class="form-control"placeholder="Behance Link">
                    </div>
                    <div class="form-group">
                        <label>GooglePlus Link</label>
                        <input type="text" name="googleplus_link" class="form-control"placeholder="GooglePlus Link">
                    </div>




                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
