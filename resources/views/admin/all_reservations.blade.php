@extends('admin.layouts.templates')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Reservations</h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Guests</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allreservations as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->number_guests }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->time }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td><a href="{{ route('deletereservation', $data->id) }}"
                                                style="margin-right:10px;"class="btn btn-danger"
                                                onclick=" return confirm('Are you sure to delete it?')">Delete</a><a
                                                href="" class="btn btn-success">Done</a></td>

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
