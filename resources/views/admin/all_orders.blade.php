@extends('admin.layouts.templates')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Orders</h4>
                    {{-- <span>
                        <form action="{{ route('searchorder') }}" method="post"
                            class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            @csrf
                            <input type="text" name="search" id="searc_order"style="color:#fff"class="form-control"
                                placeholder="Search Orders" data-url="{{ route('searchorderajax') }}">
                            <input type="submit" value="Search">
                        </form>

                    </span> --}}

                    {{-- Ajax Search --}}
                    <span>
                        <form action="" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            @csrf
                            <input type="text" name="q" id="searchUser" style="color:#fff"class="form-control"
                                placeholder="Search Orders">

                            <input type="submit" value="Search">
                        </form>

                    </span>
                    {{-- <span id="userList"></span> --}}
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
                                    <th>User Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Post Code</th>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="userList">
                                @if (count($order_items) > 0)
                                    @foreach ($order_items as $data)
                                        <tr>
                                            <td>{{ $data->user_id }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->mobile }}</td>
                                            <td>{{ $data->postcode }}</td>
                                            <td>{{ $data->foodName }}</td>
                                            <td>${{ $data->price }}</td>
                                            <td>{{ $data->quantity }}</td>
                                            <td>${{ $data->totalPrice }}</td>
                                            <td><a href="{{ route('deleteorder', $data->id) }}"
                                                    style="margin-right:10px;"class="btn btn-danger"
                                                    onclick=" return confirm('Are you sure to delete it?')">Delete</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td colspan="7"><b>No order like your search</b></td>
                                        <td></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
