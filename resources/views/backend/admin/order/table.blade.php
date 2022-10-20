@extends('backend.layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Orders</h4>
                        <p class="category">List of all orders</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                       @foreach($data as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                <td>{{$d->user}}</td>
                                <td>{{$d->product}}</td>
                                <td>{{$d->quantity}}</td>
                                <td>{{$d->address}}</td>
<td><span class="label label-success">Confirmed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-success ti-close"
                                            title="Cancel Order"></button></td>

                                    <td><a href="{{route('admin.order.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt"
                                            title="Details"></button>
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
</div>
@endsection
