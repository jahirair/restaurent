@extends('admin.layouts.templates')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Chefs</h4>
                    @if (\Session::has('message'))
                        <div class="alert alert-success">

                            {{ \Session::get('message') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="close"
                                style="float:right;">x</button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>

                                    <th>Expert</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allchefs as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>

                                        <td>{{ $data->expert }}</td>
                                        <td><img src="{{ url('Public/home/assets/images/ChefImages/' . $data->image) }}"
                                                alt="" style="width: 50px; height:50px;border-radius:10px;"></td>
                                        <td><a href="{{ route('deletechef', $data->id) }}"
                                                style="margin-right:10px;"class="btn btn-danger"
                                                onclick=" return confirm('Are you sure to delete it?')">Delete</a><a
                                                href="" class="btn btn-success">Edit</a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
