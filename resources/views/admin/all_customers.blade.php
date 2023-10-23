@extends('admin.layouts.templates')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Customers</h4>
                    <span id="message" style="float:right;margin-top:-30px;"></span>
                    @if (!empty($message))
                        <div class="alert alert-success">

                            {{ $message }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="close"
                                style="float:right;">x</button>
                        </div>
                    @endif


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allcustomers as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>

                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-danger delete-customer"
                                                style="margin-right:10px;"
                                                data-url="{{ route('deletecustomerajax', $data->id) }}">Delete</a>
                                        </td>


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
